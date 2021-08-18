<?php
include("header2.php");



if(isset($_GET['i'])){
  if($_GET['i'] == ''){

  }else{
$merchant = $_GET['i'];
$sql2 = "SELECT * FROM farm WHERE id = $merchant";
$result2 = $connect->query($sql2);
$row = $result2->fetch_assoc();
  }
}

if(isset($_POST['merchant'])){

    $code     = $_POST['code'];
    $first    = $_POST['first'];
    $user    = $_POST['user'];
    $size     = $_POST['size'];
    $regions    = $_POST['region'];
    $conditions    = $_POST['condition'];
    $date     = date("Y-m-d H:i:s");

    $sql3 = "SELECT count(*) FROM farm WHERE farm_code = '$code'";
    $result3 = $connect->query($sql3);
    $row3 = $result3->fetch_row();

    $sql4 = "SELECT count(*) FROM farm WHERE user_id = '$user'";
    $result4 = $connect->query($sql4);
    $row4 = $result4->fetch_row();


if($row3[0] == 0){
  if($row4[0] == 0){
    $sql = "INSERT INTO farm(name, size	, region_id, conditions,  status, user_id, 	farm_code, dateRegistered)
           VALUES('$first', '$size', '$regions', '$conditions', '1', '$user', '$code', '$date')";

           $sql2 = "UPDATE users SET region_id = '$regions', account_id = '$code' WHERE user_id = $user";

if($connect->query($sql) === TRUE && $connect->query($sql2) === TRUE){

  $sql3 = "SELECT * FROM farm WHERE farm_code = '$code'";
$result3 = $connect->query($sql3);
$row3 = $result3->fetch_assoc();
$id = $row3['id'];
  $valid['messages'] = "You have successfully added a farm into the system.";
  header("refresh: 3;  url=farmreg.php?i=$id");	
}else{
  $valid['messages'] = "An error has occured while adding a farm into the system.$sql";
}
}else{
  $valid['messages'] = "You have a farm already registered.";	
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
  $website  = $_POST['website'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $address  = $_POST['address'];
  $phone    = $_POST['phone'];
  $city     = $_POST['city'];
  $date     = date("Y-m-d H:i:s");



  $sql = "UPDATE merchants SET firstname = '$first', lastname = '$last', email = '$email', password = '$password', 
  company = '$username', address = '$address', city = '$city', website = '$website' WHERE id = $id";

if($connect->query($sql) === TRUE){

$valid['messages'] = "You have successfully edited a farmer in the system.";
header("refresh: 6;  url=farmreg.php?i=".$_GET['i']."");

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
    <h1 class="text-light">Register your farm</h1>
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
<form class="row g-3" action="farmreg.php?i=<?php echo $merchant?>" method="POST">
<input type="hidden" name="user" value="<?php echo $user_id; ?>">
<div class="col-6">
    <label for="inputAddress2" class="form-label">Farm Name</label>
    <input type="text"  class="form-control" name="first" required value="<?php echo $row['name'];?>" id="inputAddress2" placeholder="Name">
  </div> 
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Farm size in square meters</label>
    <input type="text"  class="form-control" name="size"required value="<?php echo $row['size'];?>" id="inputAddress2" placeholder="size">
  </div>
 
  <?php
  if(isset($_GET['i'])){
  }else{
  ?>
   <div class="col-6">
    <label for="inputAddress2" class="form-label">Farm code</label>
    <input type="text" readonly  class="form-control" name="code"required value="<?php
    $fourRandomDigit = mt_rand(1000,9999);
    echo $fourRandomDigit;?>" id="inputAddress2" placeholder="farm code">
  </div>
<div class="col-6">
  <br>
    <label for="inputAddress2" class="form-label">Select Region</label>

    <select name="region" class="form-control" required>
    <option>select</option>
    <?php
    $sql4 = "SELECT * FROM regions WHERE status = 1";
    $result4 = $connect->query($sql4);
    While($row4 = $result4->fetch_assoc()){
    ?>
    <option value="<?php echo $row4['id'] ?>"><?php echo $row4['name']; ?></option>
    <?php
    }
    ?>
    </select>
  </div>
  <?php
  }
  ?>
    <?php
  if(isset($_GET['i'])){
  }else{
  ?>
<div class="col-6">
  <br>
    <label for="inputAddress2" class="form-label">Select condition</label>

    <select name="condition" class="form-control" required>
    <option>Select</option>
    <?php
    $sql4 = "SELECT * FROM conditions WHERE status = 1";
    $result4 = $connect->query($sql4);
    While($row4 = $result4->fetch_assoc()){
    ?>
    <option value="<?php echo $row4['id'] ?>"><?php echo $row4['name']; ?></option>
    <?php
    }
    ?>
    </select>
  </div>
  <?php
  }
  ?>

  <div class="col-12">
  <br>
  <?php
  if(isset($_GET['i'])){
    if($_GET['i'] == ""){
  ?>
  <button type="submit" name="merchant" class="btn btn-primary">Register</button>
    <?php
  }else{
    ?>
     <input type="hidden" value="<?php echo $row['id'];?>" name="id" >
        <button type="submit" name="edit" class="btn btn-primary">Update</button>
    <?php
  }
}else{
  ?>
   <button type="submit" name="merchant" class="btn btn-primary">Register</button>
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