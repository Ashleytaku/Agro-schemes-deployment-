<?php 	

require_once 'core.php';

$sql = "SELECT notice_id, notice_name, active FROM notices WHERE active = 1";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $activenotices = ""; 

 while($row = $result->fetch_array()) {
 	$noticesId = $row[0];
 	// active 
 	if($row[2] == 1) {
 		// activate member
 		$activenotices = "<label class='label label-success'>Available</label>";
 	} else {
 		// deactivate member
 		$activenotices = "<label class='label label-danger'>Not Available</label>";
 	}

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" id="editnoticesModalBtn" data-target="#editnoticesModal" onclick="editnotices('.$noticesId.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removenoticesModal" id="removenoticesModalBtn" onclick="removenotices('.$noticesId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';

 	$output['data'][] = array( 		
 		$row[1], 		
 		$activenotices,
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);