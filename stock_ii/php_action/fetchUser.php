<?php 	
require_once 'core.php';

$sql = "SELECT users.user_id, users.username, users.User_image, users.email, users.type, users.status FROM users";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $active = ""; 

 while($row = $result->fetch_array()) {
 	$userId = $row[0];
 	// active 
 	if($row[5] == 'active') {
 		// activate member
 		$active = "<label class='label label-success'>Active</label>";
 	} else {
 		// deactivate member
 		$active = "<label class='label label-danger'>Inactive</label>";
	 } // /else
	 
	 

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	  <li id="topNavAddOrder"><a href="orders.php?o=add&u='.$userId.'"> <i class="glyphicon glyphicon-plus"></i> Add Orders for user</a></li>            
	    <li><a type="button" data-toggle="modal" data-target="#removeUserModal" id="removeUserModalBtn" onclick="removeUser('.$userId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';

	// $brandId = $row[3];
	// $brandSql = "SELECT * FROM brands WHERE brand_id = $brandId";
	// $brandData = $connect->query($sql);
	// $brand = "";
	// while($row = $brandData->fetch_assoc()) {
	// 	$brand = $row['brand_name'];
	// }

	// $brand = $row[9];
	// $category = $row[10];

	$imageUrl = $row[2];
	$userImage = "<img class='img-round' src='../".$imageUrl."' style='height:30px; width:50px;'/>";

 	$output['data'][] = array( 		
 		// image
		 $userImage,
 		// user name
		 $row[1], 
 		// email
		 $row[3],
 		// status 
 		$active,
 		// button
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);