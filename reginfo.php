<?php
include("header2.php");



if(isset($_GET['i'])){
  if($_GET['i'] == ''){

  }else{
$merchant = $_GET['i'];
$sql2 = "SELECT * FROM regions WHERE id = $merchant";
$result2 = $connect->query($sql2);
$row = $result2->fetch_assoc();
  }
}

if(isset($_POST['merchant'])){

    $first    = $_POST['first'];
    $code     = $_POST['code'];
    $extension    = $_POST['extension'];
    $address  = $_POST['address'];
    $date     = date("Y-m-d H:i:s");

    $sql3 = "SELECT count(*) FROM regions WHERE region_code = '$code'";
    $result3 = $connect->query($sql3);
    $row3 = $result3->fetch_row();


if($row3[0] == 0){
    $sql = "INSERT INTO regions(name, region_code	, extension_officer, description,  status, dateRegistered)
           VALUES('$first', '$code', '$extension', '$address', '1', '$date')";

if($connect->query($sql) === TRUE){

  $sql3 = "SELECT * FROM regions WHERE region_code = '$code'";
$result3 = $connect->query($sql3);
$row3 = $result3->fetch_assoc();
$id = $row3['id'];
  $valid['messages'] = "You have successfully added a region into the system.<a href='reginfo.php?i=$id'>refresh</a>";
  // header("refresh: 3;  url=reginfo.php?i=$id");	
}else{
  $valid['messages'] = "An error has occured while adding a region into the system.$sql";
}
}else{
  $valid['messages'] = "The code you have submitted is already in use";	
}

}


if(isset($_POST['edit'])){

  $id       = $_POST['id'];
  $first    = $_POST['first'];
  $last     = $_POST['last'];
  $email    = $_POST['email'];
  $username = $_POST['username'];
  
  $extension    = $_POST['extension'];
  $website  = $_POST['website'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $address  = $_POST['address'];
  $phone    = $_POST['phone'];
  $city     = $_POST['city'];
  $date     = date("Y-m-d H:i:s");



  $sql = "UPDATE regions SET name = '$first', description = '$address', extension_officer = '$extension'  WHERE id = $id";

if($connect->query($sql) === TRUE){

$valid['messages'] = "You have successfully edited a merchant in the system.<a href='reginfo.php?i=$merchant'>refresh</a>";
// header("refresh: 6;  url=merchants.php?i=$id");

}else{
$valid['messages'] = "An error has occured while saving your edits.";
}

}

?>

<div class="col-md-9 container" style="margin-top: 70px;">
    <div class="justify-content-right d-flex flex-column" 
    style="width:100%">
<div class="p-5 bg-white rounded shadow mx-auto" style="width: 100%;">

<section style="background-color: black;">
<div class="container-fluid p-0 text-center" style="height: 200px;">
<br><br>
<div class="text-center">
    <h1 class="text-light">Add Regions</h1>
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
<form class="row g-3" action="reginfo.php?i=<?php echo $merchant?>" method="POST">
<div class="col-6">
    <label for="inputAddress2" class="form-label">Name</label>
    <input type="text"  class="form-control" name="first" required value="<?php echo $row['name'];?>" id="inputAddress2" placeholder="Name">
  </div> 
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Region Code</label>
    <input type="text"  class="form-control"<?php if(isset($_GET['i'])){ echo 'readonly';}?> name="code"required value="<?php echo $row['region_code'];?>" id="inputAddress2" placeholder="region code">
  </div>
  <?php
  if(isset($_GET['i'])){
    if($_GET['i'] == ''){

  
}else{
  
  ?>
  <div class="col-6">
  <br>
  <label for="inputAddress2" class="form-label">Main Extension Officer</label>

<select name="extension" class="form-control" required>
<?php if(isset($_GET['i'])){ 
  $user = $row['extension_officer'];
  $sql4 = "SELECT * FROM users where type = 'extension' and user_id = $user";
  $result4 = $connect->query($sql4);
  While($row4 = $result4->fetch_assoc()){
    ?><option value="<?php echo $row4['user_id'] ?>">
 <?php echo $row4['first_name'].' '.$row4['last_name'] ?>
  </option>
  <?php
  }
}else{
}
?>
<?php
$sql4 = "SELECT * FROM users where type = 'extension'";
$result4 = $connect->query($sql4);
While($row4 = $result4->fetch_assoc()){
?>
<option value="<?php echo $row4['user_id'] ?>"><?php echo $row4['first_name'].' '.$row4['last_name'] ?></option>
    <?php
    }
    ?>
    </select>
  </div>
  <?php
}
  }else{
  ?>
<div class="col-6">
  <br>
    <label for="inputAddress2" class="form-label">Main Extension Officer</label>

    <select name="extension" class="form-control" required>
    <option>select</option>
    <?php
    $sql4 = "SELECT * FROM users WHERE type = 'extension'";
    $result4 = $connect->query($sql4);
    While($row4 = $result4->fetch_assoc()){
    ?>
    <option value="<?php echo $row4['user_id']; ?>"><?php echo $row4['first_name'].''.$row4['last_name'] ?></option>
    <?php
    }
    ?>
    </select>
  </div>
  <?php
  }
  ?>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Description</label>
    <textarea name="address" class="form-control"  required><?php echo $row['description'] ?></textarea>
  </div>

  <div class="col-12">
  <br>
  <?php
  if(isset($_GET['i'])){
    if($_GET['i'] == ""){
  ?>
  <button type="submit" name="merchant" class="btn btn-primary">Add Regions</button>
    <?php
  }else{
    ?>
     <input type="hidden" value="<?php echo $row['id'];?>" name="id" >
        <button type="submit" name="edit" class="btn btn-primary">Edit Regions</button>
    <?php
  }
}else{
  ?>
   <button type="submit" name="merchant" class="btn btn-primary">Add Regions</button>
  <?php
}
?>
  </div>
</form>
</div>
</section>
</div>
    </div>
</div>
<?php
include("footer2.php");
?>