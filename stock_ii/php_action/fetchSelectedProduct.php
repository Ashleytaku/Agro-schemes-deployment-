<?php 	

require_once 'core.php';

$productId = $_POST['productId'];

$sql = "SELECT product_id, product_name, product_image, product_image1, product_image2, code, offer, description, specifications, category, brand_id,  categories_id, categories_id2, categories_id3, quantity, rate, active, status FROM product WHERE product_id = $productId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);