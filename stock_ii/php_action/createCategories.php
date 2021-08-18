<?php 	
require_once 'core.php';

// $valid['success'] = array('success' => false, 'messages' => array());

if(isset($_POST['submitArea'])) {	

	$user              =     htmlentities(str_replace("'","&#x2019;",$_POST['user']));
	$categoriesName    =     htmlentities(str_replace("'","&#x2019;",$_POST['categoriesName']));
	$areaSize          =     htmlentities(str_replace("'","&#x2019;",$_POST['areaSize'])); 
	$first             =     htmlentities(str_replace("'","&#x2019;",$_POST['first'])); 
	$last              =     htmlentities(str_replace("'","&#x2019;",$_POST['last'])); 
	$national          =     htmlentities(str_replace("'","&#x2019;",$_POST['nationalID'])); 
	$noOstands         =     htmlentities(str_replace("'","&#x2019;",$_POST['noOstands'])); 
	$noOlow            =     htmlentities(str_replace("'","&#x2019;",$_POST['noOlow'])); 
	$noOhigh           =     htmlentities(str_replace("'","&#x2019;",$_POST['noOhigh'])); 
	$noOmed            =     htmlentities(str_replace("'","&#x2019;",$_POST['noOmed'])); 
	$noOcomm           =     htmlentities(str_replace("'","&#x2019;",$_POST['noOcomm'])); 
	$noOrec            =     htmlentities(str_replace("'","&#x2019;",$_POST['noOrec'])); 
	$sizeOmed          =     htmlentities(str_replace("'","&#x2019;",$_POST['sizeOmed'])); 
	$sizeOlow          =     htmlentities(str_replace("'","&#x2019;",$_POST['sizeOlow']));  
	$sizeOhigh         =     htmlentities(str_replace("'","&#x2019;",$_POST['sizeOhigh']));   
	$sizeOcomm         =     htmlentities(str_replace("'","&#x2019;",$_POST['sizeOcomm']));  
	$sizeOrec          =     htmlentities(str_replace("'","&#x2019;",$_POST['sizeOrec']));  
	$sizeFdev          =     htmlentities(str_replace("'","&#x2019;",$_POST['sizeFdev']));  
	$priceOmed         =     htmlentities(str_replace("'","&#x2019;",$_POST['priceOmed'])); 
	$priceOlow         =     htmlentities(str_replace("'","&#x2019;",$_POST['priceOlow'])); 
	$priceOhigh        =     htmlentities(str_replace("'","&#x2019;",$_POST['priceOhigh'])); 
	$priceOcomm        =     htmlentities(str_replace("'","&#x2019;",$_POST['priceOcomm'])); 
	$priceOverall      =     htmlentities(str_replace("'","&#x2019;",$_POST['priceOrec']));
	$date              =     date("Y-m-d H:i:s");
	

	$sql = "INSERT INTO areas (area_name, provider_id, Name, nationalId, n_of_stands, n_of_low, n_of_high, n_of_med, n_of_commercial,
	n_of_recreational, 	s_for_dev, s_for_low, s_for_med, s_for_high, s_for_commercial, s_for_recreational, 
	price_for_low, price_for_high, price_for_med, price_for_commercial,
	council_decision, n_of_stands_sale, date, area_status) 
	VALUES ('$categoriesName', '$user', '$first.' '.$last', '$national', '$noOstands', '$noOlow', '$noOhigh', '$noOmed', '$noOcomm', '$noOrec',
	'$sizeFdev', '$sizeOlow', '$sizeOmed', '$sizeOhigh', '$sizeOcomm', '$sizeOrec', '$priceOlow',
'$priceOhigh', '$priceOmed', '$priceOcomm', 'pending', '$noOstands', '$date', 2)";

	if($connect->query($sql) === TRUE) {
		$valid['messages'] = "Successfully Added";	
		header("refresh:2; url=../categories.php?shop=$dbname");
	} else {
	 	$valid['messages'] = "Error while adding the members. $sql";
	}

	// $connect->close();

	echo json_encode($valid);
 
} // /if $_POST