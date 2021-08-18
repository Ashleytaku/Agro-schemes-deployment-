<?php 	

require_once 'core.php';

$noticesId = $_POST['noticesId'];

$sql = "SELECT notice_id, notice_name, notice, active FROM notices WHERE notice_id = $noticesId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);