<?php 	
require_once 'core.php';
$user_id = $_SESSION['userId'];
$sql = "SELECT area_id, area_name, council_decision  FROM areas WHERE area_id = $user_id";



$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $activeCategories = ""; 

 while($row = $result->fetch_array()) {
 	$categoriesId = $row[0];
 	// active 
 	if($row[2] == 'accepted') {
		// activate member
		$activeCategories = "<label class='label label-success'>Approved</label>";
	} else if($row[2] == 'pending'){
		// deactivate member
		$activeCategories = "<label class='label label-danger'>Pending</label>";
	} else{
	   // deactivate member
	   $activeCategories = "<label class='label label-danger'>Rejected</label>";
   }
	 
	 $imageUrl = $row[4];
	 if($row[4] == ""){
       $categoryImage = "<p>no image</p>";
	 }else{
	$categoryImage = "<img class='img-round' src='custom/".$imageUrl."' style='height:30px; width:50px;'  />";
	 }

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
		<li><a type="button" href="area.php?i='.$categoriesId.'"> <i class="fa fa-edit"></i> Edit</a></li>
	 
		<li><a type="button" href="categoriesPhoto.php?edit='.$categoriesId.'"> <i class="fa fa-edit"></i> Add Image</a></li>
		</ul>
	</div>';

 	$output['data'][] = array( 	
		$categoryImage,	
 		$row[1], 		
 		$activeCategories,
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);