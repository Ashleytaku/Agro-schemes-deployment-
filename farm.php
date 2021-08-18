<?php
include("header2.php");



if(isset($_GET['i'])){
  if($_GET['i'] == ''){

  }else{
$merchant = $_GET['i'];
$sql2 = "SELECT * FROM projects WHERE id = $merchant";
$result2 = $connect->query($sql2);
$row = $result2->fetch_assoc();
$merchants = $row['merchantId'];
  }
}

if(isset($_POST['merchant'])){

    $name         = $_POST['name'];
    $merchant     = $_POST['merchantid'];
    $price        = $_POST['price'];
    $farmers        = $_POST['farmers'];
    $description  = htmlentities(str_replace("'","&#x2019;",$_POST['description']));
    $date     = date("Y-m-d H:i:s");

    $type1 = explode('.', $_FILES['first']['name']);
	$type1 = $type1[count($type1)-1];		
	$url1 = 'images/images'.uniqid(rand()).'.'.$type1;
	if(in_array($type1, array('gif', 'jpg', 'jpeg', 'png', 'mp4', 'avi', '3gp','JPG', 'GIF', 'JPEG', 'PNG', 'MP4',
        'AVI', '3GP'))) {
		if(is_uploaded_file($_FILES['first']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['first']['tmp_name'], $url1)) {

    $sql = "INSERT INTO projects(name, region, fundtotal, image, fundavailable, description, no_of_farmers, datesaved)
           VALUES('$name', $merchant,  '$price', '$url1', '$price', '$description', '$farmers', '$date')";

if($connect->query($sql) === TRUE){

  $sql3 = "SELECT * FROM products ORDER BY id DESC LIMIT 1";
$result3 = $connect->query($sql3);
$row3 = $result3->fetch_assoc();
$id = $row3['id'];
  $valid['messages'] = "You have successfully added a product into the system.";
  header("refresh: 3;  url=prodinfo.php?i=$id");	
}else{
  $valid['messages'] = "An error has occured while adding a product into the system.$sql";
}


}	else {
    return false;
}	// /else	
} // if
} // if in_array 

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

$valid['messages'] = "You have successfully edited a product in the system.";
header("refresh: 2;  url=prodinfo.php?i=".$_GET['i']."");

}else{
$valid['messages'] = "An error has occured while saving your edits.$sql";
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
            header("refresh:2; url=prodinfo.php?i=$productId");	
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
              header("refresh:2; url=prodinfo.php?i=$productId");	
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
                header("refresh:2; url=prodinfo.php?i=$productId");	
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
    <h1 class="text-light">Edit project</h1>
    <?php
  }else{
    ?> <h1 class="text-light">Add project</h1>
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
<form class="row g-3" action="prodinfo.php?i=<?php echo $merchant?>" method="POST" enctype="multipart/form-data">

<input type="hidden" value="<?php echo $row['id'];?>" name="mercharntid" >
<?php
  if(isset($_GET['i'])){
    if($_GET['i'] == ""){
  ?>
   <div class="col-6">
<br>
    <label for="inputAddress2" class="form-label">Project Image</label>
    <input type="file"  class="form-control" name="first" value="" id="inputAddress2" placeholder="Name">
  </div>
  <
  <?php
    }else{

    }
}else{
    ?>
    <div class="col-6">
<br>
    <label for="inputAddress2" class="form-label">Project Image</label>
    <input type="file"  class="form-control" name="first" value="" id="inputAddress2" placeholder="Name">
  </div> 
    <?php
}
  ?>
  <div class="col-6">
  <br>
    <label for="inputAddress2" class="form-label">Project name</label>
    <input type="text"  class="form-control" name="name" value="<?php echo $row['name'];?>" placeholder="name">
  </div>
  <div class="col-12">
  <br>
    <label for="inputAddress" class="form-label">Descripton</label>
    <textarea name='description' class="form-control"><?php echo $row['description'];?></textarea>
  </div>
  <div class="col-6">
  <br>
    <label for="inputAddress2" class="form-label">Funded Cash</label>
    <input type="text"  class="form-control" value="<?php echo $row['price'];?>" name="price"  placeholder="0.00">
  </div>
  <div class="col-6">
  <br>
    <label for="inputAddress2" class="form-label">No of farmers</label>
    <input type="text"  class="form-control" value="<?php echo $row['price'];?>" name="farmers"  placeholder="">
  </div>
  <div class="col-6">
  <br>
    <label for="inputAddress2" class="form-label">Status</label>
    <select  class="form-control"  name="status"  placeholder="0.00">
    <option value='<?php echo $row['status'];?>'><?php if($row['status'] == 1){echo 'active';}else{
      echo 'inactive';
    }
    ?></option>
    <option value='1'>activate</option>
    
    <option value='2'>deactivate</option>
    </select>
  </div>
  <?php
  if(isset($_GET['i'])){
    if($_GET['i'] == ''){
  
  ?>
  <div class="col-6">
  <br>
  <label for="inputAddress2" class="form-label">Regions</label>

<select name="merchantid" class="form-control">
<?php
$sql4 = "SELECT * FROM merchants";
$result4 = $connect->query($sql4);
While($row4 = $result4->fetch_assoc()){
?>
<option value="<?php echo $row4['id'] ?>"><?php echo $row4['company'] ?></option>
    <?php
    }
    ?>
    </select>
  </div>
  <?php
  
}else{

}
  }else{
  ?>
<div class="col-6">
  <br>
    <label for="inputAddress2" class="form-label">Regions</label>

    <select name="merchantid" class="form-control">
    <?php
    $sql4 = "SELECT * FROM regios";
    $result4 = $connect->query($sql4);
    While($row4 = $result4->fetch_assoc()){
    ?>
    <option value="<?php echo $row4['id'] ?>"><?php echo $row4['company'] ?></option>
    <?php
    }
    ?>
    </select>
  </div>
  <?php
  }
  ?>
  <div class="col-12">
  
  <?php
  if(isset($_GET['i'])){
    if($_GET['i'] == ""){
  ?>
  <br>
  <button type="submit" name="merchant" class="btn btn-primary">Add Project</button>
  <br>
    <?php
  }else{
    ?>
    <br>
        <button type="submit" name="edit" class="btn btn-primary">Edit Project</button>
        <br>
    <?php
  }
}else{
  ?>
  <br>
   <button type="submit" name="merchant" class="btn btn-primary">Add Project</button>
   <br>
  <?php
}
?>
  </div>
</form>

<?php
if(isset($_GET['i'])){
?>
<div class="card-deck"  style="width: 100%;">

<div class="card"  style="width: 100%;">
<img class="card-img-top" src="<?php echo $row['pic1']; ?>"  style="width: 100%;height:25rem;" alt="Card image cap">
<div class="card-body">
<form class="form-horizontal" action="prodinfo.php?i=<?php echo $merchant?>" method="POST" enctype="multipart/form-data">
  <h4 class="card-title">Header (image should be not more than 250kb or it will report null.)</h4>
  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
   <input type="file" class="form-control" id="img4" placeholder="image 4" name="img4" class="file-loading" style="width:auto;"/ required>
   <button type='submit' name="first" class="btn btn-primary">Update image</button>
</div>
  </form>
</div>

<div class="card"  style="width: 100%;">
<img class="card-img-top" src="<?php echo $row['pic2']; ?>"  style="width: 100%;height:25rem;" alt="Card image cap">
<div class="card-body">
<form class="form-horizontal" id="submitProductForm" action="prodinfo.php?i=<?php echo $merchant?>" method="POST" enctype="multipart/form-data">
  <h4 class="card-title">Image 1(image should be not more than 250kb or it will report null.)</h4>
  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
   <input type="file" class="form-control" id="img4" placeholder="image4 name" name="img4" class="file-loading" style="width:auto;"/ required>
  <button type='submit' name="second" class="btn btn-primary">Update image</button>
  </form>
</div>
</div>

<div class="card"  style="width: 100%;">
<img class="card-img-top" src="<?php echo $row['pic3']; ?>"  style="width: 100%;height:25rem;" alt="Card image cap">
<div class="card-body">
<form class="form-horizontal" id="submitProductForm" action="prodinfo.php?i=<?php echo $merchant?>" method="POST" enctype="multipart/form-data">
  <h4 class="card-title">Image 1(image should be not more than 250kb or it will report null.)</h4>
  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
   <input type="file" class="form-control" id="img4" placeholder="image4 name" name="img4" class="file-loading" style="width:auto;"/ required>
  <button type='submit' name="third" class="btn btn-primary">Update image</button>
  </form>
</div>
</div>

  </div>
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