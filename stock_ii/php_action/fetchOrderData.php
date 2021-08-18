<?php 	

require_once 'core.php';

$orderId = $_POST['orderId'];

$valid = array('order' => array(), 'order_item' => array());

$sql = "SELECT tbl_order.id, tbl_order.order_at, tbl_order.name, tbl_order.phone, tbl_order.amount, 
 tbl_order.paid, tbl_order.payment_type, tbl_order.order_status FROM tbl_order 	
	WHERE tbl_order.id = {$orderId}";

$result = $connect->query($sql);
$data = $result->fetch_row();
$valid['order'] = $data;


$connect->close();

echo json_encode($valid);