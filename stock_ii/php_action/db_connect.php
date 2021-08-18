<?php 	
// require __DIR__."/../../dbnetwork.php";

$localhost = "127.0.0.1";
$username = "root";
$password = "";
// $db = "$dbname";
$db = "agro";
// db connection
$connect = new mysqli($localhost, $username, $password, $db);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
  // echo $dbname;
}
date_default_timezone_set('Africa/Harare');

?>