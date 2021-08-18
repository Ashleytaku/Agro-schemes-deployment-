<?php 	

require_once 'php_action/core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {		

$productId = $_POST['productId'];

$type1 = explode('.', $_FILES['editProductImage2']['name']);
	$type1 = $type1[count($type1)-1];		
	$url1 = 'assests/images/stock/'.uniqid(rand()).'.'.$type1;
	if(in_array($type1, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['editProductImage2']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['editProductImage2']['tmp_name'], $url1)) {


               
                $sql = "UPDATE product SET product_image1 = '$url1' WHERE product_id = $productId";				

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