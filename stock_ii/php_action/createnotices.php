<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$noticesName = $_POST['noticesName'];
	      $notice = $_POST['notice'];
  $noticesStatus = $_POST['noticesStatus']; 
  $noticesDate = date("Y-m-d H:i:s");

	$sql = "INSERT INTO notices (notice_name, notice, active, notice_date) 
	VALUES ('$noticesName', '$notice', '$noticesStatus', '$noticesDate')";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Added";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the members";
	}

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST