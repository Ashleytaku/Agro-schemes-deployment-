<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$brandName = $_POST['editnoticesName'];
	 $notice = $_POST['editnotice'];
  $brandStatus = $_POST['editnoticesStatus']; 
 $noticesId = $_POST['editnoticesId'];

	$sql = "UPDATE notices SET notice_name = '$brandName', notice = '$notice', active = '$brandStatus' WHERE notice_id = '$noticesId'";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while updating the notices";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST