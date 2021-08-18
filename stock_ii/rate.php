<?php require_once 'php_action/db_connect.php';
 require_once 'includes/header.php'; 
 require_once 'php_action/functions.php';


$rate = "SELECT * FROM rate ORDER BY id DESC LIMIT 1";
$query = $connect->query($rate);
$row = $query->fetch_assoc();

$rtgs = $row['amount'];


?>

<?php

if(isset($_POST['submit'])){

  $date = date("Y-m-d H:i:s");

  $ecocash = mysqli_real_escape_string($link,$_POST['ecocash']);


  $query = "INSERT INTO rate(amount, status, date) VALUES('$ecocash', 2, '$date')";
  
  $query1b = "UPDATE `rate` SET `status` = 2";

    if ($add = (mysqli_query($link, $query)) && (mysqli_query($link, $query1b))) {
        // Success!
        $query2 = "UPDATE `rate` SET `status` = 1 ORDER BY id DESC LIMIT 1";
        if ($add = mysqli_query($link, $query2)) {

         
           
        $alert['messages'] =  'thank you for the details the rate has been updated';
        
      	header("refresh:3; url=rate.php");
          
        
        }else{
          $alert['messages'] =  'third error';
        }
        // header("refresh:1; url=../../AccountInfo.php");
    } else{
        $alert['messages'] =  'MySQL Error: ' . mysqli_error($link); // this will tell you whats wrong
    }
    mysqli_close($link);

}



?>
<div class="container">

<div class="card border-warning mb-3" style="max-width:350px;border-radius:20%;">
  <br>

  <br><br>
  <div class="card-body text-warning">
    <h4 class="card-title">the current rate is : <?php echo $rtgs ?> </h4>        
  </div>
</div><br>

<?php
if($_GET['o'] == 'manord') { 
	echo "<div class='div-request div-hide'>manord</div>";
} else if($_GET['o'] == 'editOrd') { 
	echo "<div class='div-request div-hide'>editOrd</div>";
} // /else manage order


?>



<form method="POST" action="rate.php?shop=<?php echo $dbname;?>">
<div class="messages">
<?php if($alert) {
								foreach ($alert as $key => $value) {
									echo '<div class="alert alert-success" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									'.$value.'</div>';										
									}
								} ?>
						</div>
<div class="form-group">
<label for="formGroupExampleInput">Change Rate:</label>
<input type="text" class="form-control" id="formGroupExampleInput" name="ecocash" placeholder="USD/ZWL">
</div>

<button type="submit" name="submit" class="btn btn-warning">submit</button>



</form>



 













</div>

<?php require_once 'includes/footer.php'; ?>

