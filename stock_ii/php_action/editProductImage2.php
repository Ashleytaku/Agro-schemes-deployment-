<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST['fileUpload']) {		

$categoriesId = $_POST['categoriesId'];

$type1 = explode('.', $_FILES['editProductImage']['name']);
	$type1 = $type1[count($type1)-1];		
	$url1 = '../assests/images/stock/'.uniqid(rand()).'.'.$type1;
	if(in_array($type1, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['editProductImage']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['editProductImage']['tmp_name'], $url1)) {


               
                $sql = "UPDATE categories SET categories_image = '$url1' WHERE categories_id = $categoriesId";				

				if($connect->query($sql) === TRUE) {									
					$valid['success'] = true;
					$valid['messages'] = "Successfully Updated";
		header("refresh:2; url=../categories.php?shop=$dbname");

				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while updating categories image";
		header("refresh:2; url=../categories.php?shop=$dbname");
				}
			}	else {
				return false;
			}	// /else	
		} // if
    } // if in_array 
    
    $connect->close();

	echo json_encode($valid);
 
} // /if $_POST