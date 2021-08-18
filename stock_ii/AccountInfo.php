<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'php_action/functions.php'; ?>



<?php 
$user_id = $_SESSION['userId'];
$user = "SELECT * FROM users WHERE user_id = {$user_id}";
$query = $connect->query($user);
$result = $query->fetch_assoc();


?>
<div class="container">

<div class="card border-warning mb-3" style="max-width:350px;border-radius:20%;">
  <br>
<img class="card-img-top" src="../<?php echo $result['User_image']; ?>" style="max-width:250px;max-height:150px;border-radius:40%;" alt="User/company image">
  <br><br>
  <div class="card-body text-warning">
    <h4 class="card-title">Hey  <?php echo $result['username']; ?> Welcome to your Goldcoast Merchant area</h4>        
  </div>
</div><br>

<?php
if($_GET['o'] == 'manord') { 
	echo "<div class='div-request div-hide'>manord</div>";
} else if($_GET['o'] == 'editOrd') { 
	echo "<div class='div-request div-hide'>editOrd</div>";
} // /else manage order


?>

<p class="text-warning">Here, you are able to add and edit your products, product brands, and view your orders.<br><br>
Goldcoast will send you nortifications and reminders and you are able to view them using this tab. Feel free to explore and
use our platform to your liking according to the agreed <a href="#">Terms and Conditionns</a>.<br>
<br>
In terms of querries and questions a way to write to the Goldcoast Developers will be provided soon. in the mean time use our email adress info@goldcoast.co.zw
or contact: 0776 933 994 or 0778 922 386 to contact us if you have any querries and questions.<br><br><br>

In order to receive your payments, specify the mode of payment and the details.<br><br><br></p>

<p class='text-light'> Your current details are as follow : </p><br><br>

Preffered payment method      : <?php echo $result['payment_method']; ?><br>
Ecocash number/ merchant code : <?php echo $result['ecocash']; ?><br>
Bank details                  : <?php echo $result['bank']; ?>, acc no: <?php echo $result['account']; ?>, branch :<?php echo $result['username']; ?><br><br>

<form method="POST" action="AccountInfo.php?shop=<?php echo $dbname;?>">
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="payment_method" id="inlineRadio1" value="1">
  <label class="form-check-label" for="inlineRadio1">ecocash</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="payment_method" id="inlineRadio2" value="2">
  <label class="form-check-label" for="inlineRadio2">bank</label>
</div>

<div class="form-group">
<label for="formGroupExampleInput">Ecocash Number/Merchant code</label>
<input type="text" class="form-control" id="formGroupExampleInput" name="ecocash" placeholder="ecocash">
</div>

  <div class="form-group">
    <label for="formGroupExampleInput">Bank Name</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="bank" placeholder="bank name">
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Account Number</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="account" placeholder="account">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">branch</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="branch" placeholder="branch">
  </div>
  <button type="submit" name="submit" class="btn btn-warning">submit</button>
</form>



 <h4 class="display-3 text-warning text-center">Notifications</h4><hr> <br><br>
 <hr>













</div>

<?php require_once 'includes/footer.php'; ?>

<?php

if(isset($_POST['submit'])){

  $payment_method = mysqli_real_escape_string($link,$_POST['payment_method']);

  $bank = mysqli_real_escape_string($link,$_POST['bank']);

  $ecocash = mysqli_real_escape_string($link,$_POST['ecocash']);

  $account = mysqli_real_escape_string($link,$_POST['account']);

  $branch = mysqli_real_escape_string($link,$_POST['branch']);

  $query = "UPDATE `users` SET `payment_method` = '$payment_method', `bank` = '$bank', `ecocash` = '$ecocash', `account` = '$account', `branch` = '$branch' WHERE user_id = '$user_id' ";

    if ($add = mysqli_query($link, $query)) {
        // Success!
        $alert[] =  'thank you for the details we will update your details';
        // header("refresh:1; url=../../AccountInfo.php?shop=<?php echo $dbname;?");
    } else{
        $alert[] =  'MySQL Error: ' . mysqli_error($link); // this will tell you whats wrong
    }
    mysqli_close($link);

}



?>