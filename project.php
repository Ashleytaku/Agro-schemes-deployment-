<?php
include("header2.php");



if(isset($_GET['i'])){
  if($_GET['i'] == ''){

  }else{
$merchant = $_GET['i'];
$register  = $_GET['j'];
$farmer   = $_GET['k'];

$sql2a = "SELECT * FROM farm WHERE user_id = $farmer";
$result2a = $connect->query($sql2a);
$row2a = $result2a->fetch_assoc();

$sql2c = "SELECT count(*) FROM project_registry WHERE farmer_id = $farmer";
$result2c = $connect->query($sql2c);
$row2c = $result2c->fetch_row();

$sql2 = "SELECT * FROM projects WHERE id = $merchant";
$result2 = $connect->query($sql2);
$row = $result2->fetch_assoc();
$merchants = $row['merchantId'];

$sql2b = "SELECT * FROM project_registry WHERE project_id = $merchant and farmer_id = $farmer";
$result2b = $connect->query($sql2b);
$row2b = $result2b->fetch_assoc();
  }
}else{
  
header('location: register.php');
}

if(isset($_POST['merchant'])){

    $farmer         = $_POST['farmer'];
    $funds          = $_POST['funds'];
    $project        = $_POST['project'];
    $region         = $_POST['region'];
    $description  = htmlentities(str_replace("'","&#x2019;",$_POST['description']));
    $date     = date("Y-m-d H:i:s");

  

    $sql = "INSERT INTO project_registry(project_id, farmer_id, region_id, funds_received, state, 	status, dateRegistered)
           VALUES($project , $farmer, $region, '$funds', 'applied', 1,  '$date')";

if($connect->query($sql) === TRUE){

  $sql3 = "SELECT * FROM project_registry WHERE farmer_id = $farmer ORDER BY id DESC LIMIT 1";
$result3 = $connect->query($sql3);
$row3 = $result3->fetch_assoc();
$id = $row3['id'];
  $valid['messages'] = "You have successfully claimed a project.";
  header("refresh: 3;  url=project.php?i=$merchant&j=$register&k=$farmer");	
}else{
  $valid['messages'] = "An error has occured while adding a product into the system.$sql";
}

}


if(isset($_POST['confirm'])){

  $state           = $_POST['state'];
  $rating          = $_POST['rating'];
  $id              = $_POST['id'];
  $description     = htmlentities(str_replace("'","&#x2019;",$_POST['description']));
  $date            = date("Y-m-d H:i:s");



  $sql = "UPDATE project_registry SET compliance = $rating, state = '$state' WHERE id = $id";

if($connect->query($sql) === TRUE){
$valid['messages'] = "You have successfully added your moitoring report.";
header("refresh: 3;  url=project.php?i=$merchant&j=$register&k=$farmer");	
}else{
$valid['messages'] = "An error has occured in the system.$sql";
}

}

if(isset($_POST['edit'])){

  $name         = $_POST['name'];
  // $merchant     = $_POST['merchantid'];
  $price        = $_POST['price'];
  $status       = $_POST['status'];
  $description  = htmlentities(str_replace("'","&#x2019;",$_POST['description']));
  $date     = date("Y-m-d H:i:s");



  $sql = "UPDATE products SET name = '$name', description = '$description', price = '$price',
   status = '$status' WHERE id = $merchant";

if($connect->query($sql) === TRUE){

$valid['messages'] = "You have successfully applied for this project in your region.";
header("refresh: 2;  url=project.php?i=$merchant&j=$register&k=$farmer");

}else{
$valid['messages'] = "An error has occured while applying for the project.$sql";
}

}


if(isset($_POST['first'])) {		

  $productId   = $_POST['id'];
  $description = htmlentities(str_replace("'","&#x2019;",$_POST['editDescription']));
  $website      = htmlentities(str_replace("'","&#x2019;",$_POST['website']));
  $email       = htmlentities(str_replace("'","&#x2019;",$_POST['email']));
  $title       = htmlentities(str_replace("'","&#x2019;",$_POST['title']));
  // $type        = $_POST['type'];
  $date        = date("Y-m-d H:i:s");
  
  $type1 = explode('.', $_FILES['img4']['name']);
    $type1 = $type1[count($type1)-1];		
    $url1 = 'images/images'.uniqid(rand()).'.'.$type1;
    if(in_array($type1, array('gif', 'jpg', 'jpeg', 'png', 'mp4', 'avi', '3gp','JPG', 'GIF', 'JPEG', 'PNG', 'MP4',
          'AVI', '3GP'))) {
      if(is_uploaded_file($_FILES['img4']['tmp_name'])) {			
        if(move_uploaded_file($_FILES['img4']['tmp_name'], $url1)) {
  
  
                 
                  $sql = "UPDATE products SET pic1 = '$url1' WHERE id = $productId";				
  
          if($connect->query($sql) === TRUE) {
            $valid['messages'] = "Successfully Updated";
            header("refresh:2; url=project.php?i=$merchant&j=$register&k=$farmer");	
          } else {
            $valid['messages'] = "An error occured whilist updating image";
          }
        }	else {
          return false;
        }	// /else	
      } // if
      } // if in_array 
      
      $connect->close();
  
    echo json_encode($valid);
   
  } // /if $_POST


  if(isset($_POST['second'])) {		

    $productId   = $_POST['id'];
    $description = htmlentities(str_replace("'","&#x2019;",$_POST['editDescription']));
    $website      = htmlentities(str_replace("'","&#x2019;",$_POST['website']));
    $email       = htmlentities(str_replace("'","&#x2019;",$_POST['email']));
    $title       = htmlentities(str_replace("'","&#x2019;",$_POST['title']));
    // $type        = $_POST['type'];
    $date        = date("Y-m-d H:i:s");
    
    $type1 = explode('.', $_FILES['img4']['name']);
      $type1 = $type1[count($type1)-1];		
      $url1 = 'images/images'.uniqid(rand()).'.'.$type1;
      if(in_array($type1, array('gif', 'jpg', 'jpeg', 'png', 'mp4', 'avi', '3gp','JPG', 'GIF', 'JPEG', 'PNG', 'MP4',
            'AVI', '3GP'))) {
        if(is_uploaded_file($_FILES['img4']['tmp_name'])) {			
          if(move_uploaded_file($_FILES['img4']['tmp_name'], $url1)) {
    
    
                   
                    $sql = "UPDATE products SET pic2 = '$url1' WHERE id = $productId";				
    
            if($connect->query($sql) === TRUE) {
              $valid['messages'] = "Successfully Updated";
              header("refresh:2; url=project.php?i=$merchant&j=$register&k=$farmer");	
            } else {
              $valid['messages'] = "An error occured whilist updating image";
            }
          }	else {
            return false;
          }	// /else	
        } // if
        } // if in_array 
        
        $connect->close();
    
      echo json_encode($valid);
     
    } // /if $_POST

    if(isset($_POST['third'])) {		

      $productId   = $_POST['id'];
      $description = htmlentities(str_replace("'","&#x2019;",$_POST['editDescription']));
      $website      = htmlentities(str_replace("'","&#x2019;",$_POST['website']));
      $email       = htmlentities(str_replace("'","&#x2019;",$_POST['email']));
      $title       = htmlentities(str_replace("'","&#x2019;",$_POST['title']));
      // $type        = $_POST['type'];
      $date        = date("Y-m-d H:i:s");
      
      $type1 = explode('.', $_FILES['img4']['name']);
        $type1 = $type1[count($type1)-1];		
        $url1 = 'images/images'.uniqid(rand()).'.'.$type1;
        if(in_array($type1, array('gif', 'jpg', 'jpeg', 'png', 'mp4', 'avi', '3gp','JPG', 'GIF', 'JPEG', 'PNG', 'MP4',
              'AVI', '3GP'))) {
          if(is_uploaded_file($_FILES['img4']['tmp_name'])) {			
            if(move_uploaded_file($_FILES['img4']['tmp_name'], $url1)) {
      
      
                     
                      $sql = "UPDATE products SET pic3 = '$url1' WHERE id = $productId";				
      
              if($connect->query($sql) === TRUE) {
                $valid['messages'] = "Successfully Updated";
                header("refresh:2; url=project.php?i=$merchant&j=$register&k=$farmer");	
              } else {
                $valid['messages'] = "An error occured whilist updating image";
              }
            }	else {
              return false;
            }	// /else	
          } // if
          } // if in_array 
          
          $connect->close();
      
        echo json_encode($valid);
       
      } // /if $_POST

?>

<div class="col-md-9 container" style="margin-top: 70px;">
    <div class="justify-content-right d-flex flex-column" 
    style="width:100%">
<div class="p-5 bg-white rounded shadow mx-auto" style="width: 100%;">
<section style="background-color: black;">
<div class="container-fluid p-0 text-center" style="height: 100px;">
<br>
<div class="text-center">
<?php
  if(isset($_GET['i'])){
  ?>
    <h1 class="text-light">Project Details</h1>
    <?php
  }else{
    ?> <h1 class="text-light">Project Details</h1>
    <?php
  }
    ?>
</div>
<div class="messages">
							<?php if($valid) {
								foreach ($valid as $key => $value) {
									echo '<div class="alert alert-warning" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									'.$value.'</div>';										
									}
								} ?>
                        </div>
</div>
</section>
<section style="background-color: white;">
<div class="container-fluid p-0 text-center" style="width: 95%;">
<form class="row g-3" action="project.php?i=<?php echo $merchant;?>&j=<?php echo $register;?>&k=<?php echo $farmer;?>" method="POST" enctype="multipart/form-data">

<input type="hidden" value="<?php echo $row['id'];?>" name="mercharntid" >
  <div class="col-6">
  <br>
    <label for="inputAddress2" class="form-label">Project name</label>
    <input type="text" readonly  class="form-control" name="name" value="<?php echo $row['name'];?>" placeholder="name">
  </div>
  <div class="col-12">
  <br>
    <label for="inputAddress" class="form-label">Descripton</label>
    <textarea name='description' readonly class="form-control"><?php echo $row['description'];?></textarea>
  </div>
  <div class="col-6">
  <br>
    <label for="inputAddress2" class="form-label">Funded Cash</label>
    <input type="text" readonly class="form-control" value="<?php echo $row['fundtotal'];?>" name="price"  placeholder="0.00">
  </div>
  <div class="col-6">
  <br>
    <label for="inputAddress2" class="form-label">No of eligible farmers</label>
    <input type="text" readonly  class="form-control" value="<?php echo $row['no_of_farmers'];?>" name="farmers"  placeholder="">
  </div>
  <div class="col-6">
  <br>
    <label for="inputAddress2" class="form-label">No of applied farmers</label>
    <?php
    $sql1 = "SELECT count(*) FROM project_registry WHERE project_id = $merchant";
    $result1 = $connect->query($sql1);
    $row1 = $result1->fetch_row();
    ?>
    <input type="text" readonly  class="form-control" value="<?php echo $row1[0];?>" name="farmers"  placeholder="">
  </div>

  <div class="col-12">
  <br>
    <h1 for="inputAddress2" class="form-label">List of Inputs</h1>
    <?php
    $funds = $row['fundtotal']/$row['no_of_farmers'];
    $sql1a = "SELECT * FROM inputs WHERE project_id = $merchant";
    $result1a = $connect->query($sql1a);
    while($row1a = $result1a->fetch_assoc()){
        $rpms      =  $row1a['rpms'];
        $ypms      =  $row1a['ypms'];
        $farmsize  = $row2a['size'];
        $farmcond  = $row2a['conditions'];
    ?>
    <hr>
    <p class="lead"><?php echo $row1a['name'];?> || 
    To receive = <b><?php
    $input = ($rpms * $farmsize) * ($farmcond/0.2);
echo $input.' '.$row1a['unit'];
    ?></b>
    <br><br> expected output 
    = <b><?php
    $output = ($ypms * $farmsize) * ($farmcond/0.2);
echo $output.' '.$row1a['expected_unit'];
    ?></b></p>
    <hr>
    <?php
    }
    ?>
  </div>

  <input type="hidden"  value="<?php echo $funds;?>" name="funds">
  <input type="hidden"  value="<?php echo $row['id'];?>" name="project">
  <input type="hidden"  value="<?php echo $member_id;?>" name="farmer">
  <input type="hidden"  value="<?php echo $row['region'];?>" name="region">

  <div class="col-12">
  
  <?php

  if(isset($_GET['i'])){
    if($_GET['i'] == ""){
        
  ?>
    <?php
  }else{
    if($row2b[0] >= $row['no_of_farmers']){
        ?>
        <br>
            <p>Project is full</p>
            <br>
        <?php
    }else{
        if($row2c[0] == 0){
    ?>
    <br>
        <button type="submit" name="merchant" class="btn btn-primary">Claim project inputs</button>
        <br>
    <?php
        }else{
            ?>
            <br>
        <p>Project applied for. </p>
        <p><?php echo 'Project status : <b>'.$row2b['state'].'</b>'; ?></p>
        <p><?php echo 'Compliance rating : <b>'.$row2b['compliance'].'/5</b>'; ?></p>
        <br>
            <?php
        }
  }
  }
}else{
  ?>
  <?php
}
?>
  </div>
</form>
<?php
if($_SESSION['type'] == 'extension'){
?>
<form class="row g-3" action="project.php?i=<?php echo $merchant;?>&j=<?php echo $register;?>&k=<?php echo $farmer;?>" method="POST">
<div class="col-6">
  <br>
    <label for="inputAddress2" class="form-label">Farmer to return in cash : </label>
   $ <input type="text" readonly class="form-control" value="<?php echo $row['fundtotal']/$row['no_of_farmers'];?>" name="price"  placeholder="0.00">
  </div>
  <div class="col-6">
  <br>
    <label for="inputAddress2" class="form-label">Project state</label>
    <select  class="form-control" name="state" required>
    <option value="">select</option>
    <option value="received">received</option>
    <option value="consumed">consumed</option>
    <option value="imbursed">compliance</option>
    </select>
  </div>
  <div class="col-6">
  <br>
    <label for="inputAddress2" class="form-label">Compliance rating out of 5</label>
    <select  class="form-control" name="rating" required>
    <option value="">select</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    </select>
  </div>
<input type="hidden" name='id' value="<?php echo $register?>">
<div class="col-12">
  <br>
        <button type="submit" name="confirm" class="btn btn-primary">Confirm</button>
        <br> 
</div>
  
</form>
<?php
}
?>
</div>
</section>

</div>
</div>
</div>

<?php
include("footer2.php");
?>