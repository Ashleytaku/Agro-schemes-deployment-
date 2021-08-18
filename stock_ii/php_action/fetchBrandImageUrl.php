<?php 	

require_once 'core.php';

$brandId = $_GET['i'];

$sql = "SELECT brand_image FROM brands WHERE brand_id = {$brandId}";
$data = $connect->query($sql);
$result = $data->fetch_row();

$connect->close();

echo "stock/" . $result[0];