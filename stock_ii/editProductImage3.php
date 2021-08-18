<?php 	

require_once 'php_action/core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {		

$productId = $_POST['productId'];
 

				

				$type2 = explode('.', $_FILES['editProductImage3']['name']);
	$type2 = $type2[count($type2)-1];		
	$url2 = 'assests/images/stock/'.uniqid(rand()).'.'.$type2;
	if(in_array($type2, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['editProductImage3']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['editProductImage3']['tmp_name'], $url2)) {

				$sql = "UPDATE product SET product_image2 = '$url2' WHERE product_id = $productId";				

				if($connect->query($sql) === TRUE) {									
					$valid['success'] = true;
					$valid['messages'] = "Successfully Updated";	
					header("refresh:2; url=createProduct.php?shop=$dbname&edit=$productId");
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while updating product image";
				}
			}	else {
				return false;
			}	// /else	
		} // if
	} // if in_array 
 		
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST