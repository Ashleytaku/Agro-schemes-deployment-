<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

  $UserName 		= $_POST['UserName'];
//   $UserImage 	= $_POST['UserImage'];
  $password 		=  md5($_POST['password']);
  $email 			= $_POST['email'];
  $address 			= $_POST['address'];
  $phone 			= $_POST['phone'];
  $Terms 			= $_POST['Terms'];
  $UserType 		= $_POST['UserType'];
  $UserStatus 		= 1;
//   $UserStatus 	    = $_POST['UserStatus'];

	$type = explode('.', $_FILES['UserImage']['name']);
	$type = $type[count($type)-1];		
	$url = '../assests/images/users/'.uniqid(rand()).'.'.$type;
	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['UserImage']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['UserImage']['tmp_name'], $url)) {

				$sql = "INSERT INTO users (username, User_image, password, email, Address, Phone, Terms, type, status) 
				VALUES ('$UserName', '$url', '$password', '$email', '$address', '$phone', '$Terms', '$UserType', '$UserStatus')";

				if($connect->query($sql) == TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";
					
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members";
				}

			}	else {
				return false;
			}	// /else	
		} // if
	} // if in_array 




	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST