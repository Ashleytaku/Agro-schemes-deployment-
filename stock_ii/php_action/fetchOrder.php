<?php 	

require 'core.php';

$userId = $_SESSION['user_id'];
$type   = $_SESSION['type'];
if($type != 'goldcoast')
{
// $sql2 = "SELECT order_id, order_date, client_name, client_contact, payment_status FROM orders WHERE order_status = 1";
$sql = "SELECT id, order_at, name, address, order_status, phone, city, delivery, transactionID, payment_type FROM tbl_order WHERE 
customer_id = $userId AND  active = 1 ORDER BY order_at DESC";

}else if($type == 'goldcoast')
{
	$sql = "SELECT id, order_at, name, address, order_status, phone, city, delivery, transactionID, payment_type FROM tbl_order WHERE 
active = 1 ORDER BY order_at DESC";

}

$result = $connect->query($sql);


$output = array('data' => array());

if($result->num_rows > 0) { 
 
 $paymentStatus = ""; 
 $x = 1;

 while($row = $result->fetch_array()) {
 	$orderId = $row[0];

 	$countOrderItemSql = "SELECT count(*) FROM tbl_order_item WHERE order_id = $orderId";
 	$itemCountResult = $connect->query($countOrderItemSql);
	 $itemCountRow = $itemCountResult->fetch_row();
	 
 	// active 
 	if($row[4] == 'Completed' || $row[4] == 1) { 		
 		$paymentStatus = "<p class='text-success'>Payment done</p>";
 	} else if($row[4] == 'PENDING' || $row[4] == 2) { 		
		$paymentStatus = '<a href="orders.php?o=editOrd&i='.$orderId.'"><button class="btn-raised btn-warning" >Verify Payment</button></a>';
	} 
	 
	 $delivering = "";
if($row[7] == 1 && ($row[4] == 'Completed' || $row[4] == 1)){
	$delivering = '<a href="https://wa.me/'.$row[5].'?text=We%20are%20delivering%20your%20order.%20Order%20no'.$orderId.'.">Whatsapp notify</a>';
}else if($row[7] != 2 && ($row[4] == 'Completed' || $row[4] == 1)){
	$delivering = "<form action='orders.php?o=manord' method='POST'>
	<input type='hidden' value='1' name='delivery'>
	<input type='hidden' value='$orderId' name='delivery'>
	<button type='submit' class='btn btn-primary'  name='submitDel'> <i class='fa fa-ok-sign'></i>Confirm Delivery</button>
 </form>";
}else{
	$delivering = "<p class='text-danger'>User has not paid for the order</p>";
}

if( $row[8] == "" && $row[9] == "Cash"){
	$pay = '<p class="text-danger">To be paid on delivery</p>';
}else if( $row[8] == "" && $row[9] != "Cash"){
	$pay = '<p class="text-danger">Not yet paid</p>';
}else{
$pay = $row[8];
}

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    More <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	  <li><a href="orders.php?o=editOrd&i='.$orderId.'" id="editOrderModalBtn"> <i class="fa fa-edit"></i> view details</a></li>

	    <li><a type="button" onclick="printOrder('.$orderId.')"> <i class="fa fa-print"></i> Print Order</a></li>
	    
	    <li><a type="button" data-toggle="modal" data-target="#removeOrderModal" id="removeOrderModalBtn" onclick="removeOrder('.$orderId.')"> <i class="fa fa-trash"></i> Remove Order</a></li>       
	  </ul>
	</div>';
	
	// <li><a type="button" data-toggle="modal" id="paymentOrderModalBtn" data-target="#paymentOrderModal" onclick="paymentOrder('.$orderId.')"> <i class="fa fa-save"></i> Payment</a></li>


 	$output['data'][] = array( 		
 		// image
 		$x,
 		// order date
		 $row[1],
		 // order ID
 		'#'.$row[0],
 		// client name
		 $row[2],
 		// client address 
 		$row[3].','.$row[6],
		 // phone
 		$row[5],  		 	
 		$pay, 		 	
		 $paymentStatus,
		 //delivery
		 $delivering,
 		// button
 		$button 		
 		); 	
	 $x++;
	
 } // /while 

}// if num_rows


$connect->close();

echo json_encode($output);