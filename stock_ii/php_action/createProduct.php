<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

  $productName  	= $_POST['productName'];
  $productOwner     = $_POST['owner'];
  $productCode  	= $_POST['productCode'];
  // $productImage 	= $_POST['productImage'];
  $quantity 		= $_POST['quantity'];
  $rate 			= $_POST['rate'];
  $rating 			= 2.5;
  $description 		= $_POST['description'];
  $specifications 	= $_POST['spec'];
  $offer 			= $_POST['offer'];
  $brandName 		= $_POST['brandName'];
//   $category         = $_POST['category'];
  $categoryName 	= $_POST['categoryName'];
  $categoryName2 	= $_POST['categoryName2'];
  $categoryName3 	= $_POST['categoryName3'];
  $productStatus 	= $_POST['productStatus'];
 
	$type = explode('.', $_FILES['productImage']['name']);
	$type = $type[count($type)-1];		
	$url = '../assests/images/stock/'.uniqid(rand()).'.'.$type;
	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['productImage']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['productImage']['tmp_name'], $url)) {

	// 			$type1 = explode('.', $_FILES['productImage1']['name']);
	// $type1 = $type1[count($type1)-1];		
	// $url1 = '../assests/images/stock/'.uniqid(rand()).'.'.$type1;
	// if(in_array($type1, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
	// 	if(is_uploaded_file($_FILES['productImage1']['tmp_name'])) {			
	// 		if(move_uploaded_file($_FILES['productImage1']['tmp_name'], $url1)) {

	// 			$type2 = explode('.', $_FILES['productImage2']['name']);
	// $type2 = $type2[count($type2)-1];		
	// $url2 = '../assests/images/stock/'.uniqid(rand()).'.'.$type2;
	// if(in_array($type2, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
	// 	if(is_uploaded_file($_FILES['productImage2']['tmp_name'])) {			
	// 		if(move_uploaded_file($_FILES['productImage2']['tmp_name'], $url2)) {
				
				$sql = "INSERT INTO product (product_name, owner, code, product_image,  offer, description, specifications, brand_id,  categories_id, categories_id2, categories_id3, quantity,  rate, rating, active, status) 
				VALUES ('$productName', '$productOwner', '$productCode', '$url',  '$offer', '$description', '$specifications', '$brandName',  '$categoryName', '$categoryName2', '$categoryName3', '$quantity', '$rate', '$rating', '$productStatus', 1)";

				if($connect->query($sql) === TRUE) {
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
	
// }	else {
// 	return false;
// }	// /else	
// } // if
// } // if in_array

// }	else {
// 	return false;
// }	// /else	
// } // if
// } // if in_array

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST