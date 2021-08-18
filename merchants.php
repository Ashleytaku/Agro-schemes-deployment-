<?php
include("header.php");



if(isset($_GET['i'])){
  if($_GET['i'] == ''){

  }else{
$merchant = $_GET['i'];
$sql2 = "SELECT * FROM merchants WHERE id = $merchant";
$result2 = $connect->query($sql2);
$row = $result2->fetch_assoc();
  }
}

if(isset($_POST['merchant'])){

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

    $sql3 = "SELECT count(*) FROM merchants WHERE email = '$email'";
    $result3 = $connect->query($sql3);
    $row3 = $result3->fetch_row();


if($row3[0] == 0){
    $sql = "INSERT INTO merchants(firstname, lastname, password, city, company, status, dateRegistered, phone, address, email, website)
           VALUES('$first', '$last', '$password', '$city', '$username', 1, '$date', '$phone', '$address', '$email', '$website')";

if($connect->query($sql) === TRUE){

  $sql3 = "SELECT * FROM merchants WHERE email = '$email'";
$result3 = $connect->query($sql3);
$row3 = $result3->fetch_assoc();
$id = $row3['id'];
  $valid['messages'] = "You have successfully added a merchant into the system.";
  header("refresh: 3;  url=merchants.php?i=$id");	
}else{
  $valid['messages'] = "An error has occured while adding a merchant into the system";
}
}else{
  $valid['messages'] = "The email you have submitted is already in use";	
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

$valid['messages'] = "You have successfully edited a merchant in the system.";
header("refresh: 6;  url=merchants.php?i=".$_GET['i']."");

}else{
$valid['messages'] = "An error has occured while saving your edits.";
}

}

?>
<section style="background-color: black;">
<div class="container-fluid p-0 text-center" style="height: 100px;">
<div class="text-center">
    <h1 class="text-light">Add Merchants</h1>
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
<form class="row g-3" action="merchants.php?i=<?php echo $merchant?>" method="POST">
<div class="col-6">
    <label for="inputAddress2" class="form-label">First name</label>
    <input type="text"  class="form-control" name="first" value="<?php echo $row['firstname'];?>" id="inputAddress2" placeholder="Name">
  </div> 
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Last name</label>
    <input type="text"  class="form-control" name="last" value="<?php echo $row['lastname'];?>" id="inputAddress2" placeholder="Surname">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" value="<?php echo $row['email'];?>" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Username/Company name</label>
    <input type="text" name="username" value="<?php echo $row['company'];?>" placeholder="merchant name"  class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Website</label>
    <input type="text" name="website" value="<?php echo $row['website'];?>" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" name="password" value="<?php echo $row['password'];?>" class="form-control" id="inputPassword4">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" name="address" value="<?php echo $row['address'];?>" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Phone</label>
    <input type="text"  class="form-control" value="<?php echo $row['phone'];?>" name="phone" id="inputAddress2" placeholder="phone #">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" class="form-control" value="<?php echo $row['city'];?>" name="city"  id="inputCity">
  </div>

  <div class="col-12">
  <br>
  <?php
  if(isset($_GET['i'])){
    if($_GET['i'] == ""){
  ?>
  <button type="submit" name="merchant" class="btn btn-primary">Add Merchant</button>
    <?php
  }else{
    ?>
     <input type="hidden" value="<?php echo $row['id'];?>" name="id" >
        <button type="submit" name="edit" class="btn btn-primary">Edit Merchant</button>
    <?php
  }
}else{
  ?>
   <button type="submit" name="merchant" class="btn btn-primary">Add Merchant</button>
  <?php
}
?>
  </div>
</form>
</div>
</section>

<?php
include("footer.php");
?>