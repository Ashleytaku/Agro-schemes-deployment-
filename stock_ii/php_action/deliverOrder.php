<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$orderId = $_POST['orderId'];

if($orderId) { 

 $sql = "UPDATE orders SET delivery = 1 WHERE order_id = {$orderId}";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Notified the delivery";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while processing the request";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST