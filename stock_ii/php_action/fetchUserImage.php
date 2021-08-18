<?php 	

require_once 'core.php';

$userId = $_GET['i'];

$sql = "SELECT User_image FROM users WHERE user_id = {$userId}";
$data = $connect->query($sql);
$result = $data->fetch_row();

$connect->close();

echo "users/" . $result[0];