<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {		

$BrandId = $_POST['brandId'];
 
$type = explode('.', $_FILES['editBrandImage']['name']);
	$type = $type[count($type)-1];		
	$url = '../assests/images/stock/'.uniqid(rand()).'.'.$type;
	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['editBrandImage']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['editBrandImage']['tmp_name'], $url)) {

				

				$sql = "UPDATE brands SET brand_image = '$url' WHERE brand_id = $BrandId";				

				if($connect->query($sql) === TRUE) {									
					$valid['success'] = true;
					$valid['messages'] = "Successfully Updated";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while updating Brand image";
				}
			}	else {
				return false;
			}	// /else	
		} // if
	} // if in_array 
	
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST