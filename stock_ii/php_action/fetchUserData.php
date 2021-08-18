<?php 	

require_once 'core.php';

$sql = "SELECT user_id, username FROM users WHERE status = 'active' ";
$result = $connect->query($sql);

$data = $result->fetch_all();

$connect->close();

echo json_encode($data);