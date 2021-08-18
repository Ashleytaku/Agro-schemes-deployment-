<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
  $productId      = $_POST['productId'];
	$productName  	= $_POST['productName'];
	$productOwner     = $_POST['owner'];
	$productCode  	= $_POST['code'];
	// $productImage 	= $_POST['productImage'];
	$quantity 		= $_POST['quantity'];
	$rate 			= $_POST['rate'];
	$rating 			= 2.5;
	$description 		= $_POST['description'];
	// $specifications 	= $_POST['spec'];
	$offer 			= $_POST['offer'];
	$brandName 		= $_POST['brandName'];
  //   $category         = $_POST['category'];
	$categoryName 	= $_POST['categoryName1'];
	// $categoryName2 	= $_POST['categoryName2'];
	// $categoryName3 	= $_POST['categoryName3'];
	$productStatus 	= $_POST['productStatus'];

				
	$sql = "UPDATE product SET product_name = '$productName', code = '$productCode', brand_id = '$brandName',  description = '$description',  offer = '$offer', categories_id = '$categoryName', quantity = '$quantity', rate = '$rate', active = '$productStatus', status = 1 WHERE product_id = $productId ";

	if($connect->query($sql) === TRUE) {
    $valid['messages'] = "Successfully Update";	
    header("refresh:1; url=../createProduct.php?shop=$dbname&edit=$productId");
    
	} else {
		$valid['messages'] = "Error while updating product info";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);
 
