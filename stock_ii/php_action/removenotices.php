<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$noticesId = $_POST['noticesId'];

if($noticesId) { 

 $sql = "UPDATE notices SET active = 2 WHERE notice_id = {$noticesId}";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the notice";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST