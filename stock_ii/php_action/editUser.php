<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
  $userId       = $_POST['userId'];	
  $userType 	= $_POST['editUserType'];
  $userStatus 	= $_POST['edituserStatus'];

				
	$sql = "UPDATE user SET status = '$userStatus', type = '$userType' WHERE user_id = $userId ";

	if($connect->query($sql) == TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating user info";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);
 
