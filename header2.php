<?php
require_once 'stock_ii/php_action/core.php';
if(isset($_SESSION['userId'])){
$member_id = $_SESSION['userId']; // you can your integerate authentication module here to get logged in member

$userQuery = "SELECT * FROM users WHERE user_id = $member_id";
$result    = $connect->query($userQuery);
$row       = $result->fetch_assoc();
$user_id   = $row['user_id'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Smart Agro Schemes deployment and management</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-4---Tabs-with-Arrows.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/gradient-navbar-1.css">
    <link rel="stylesheet" href="assets/css/gradient-navbar.css">
    <link rel="stylesheet" href="assets/css/Header-Blue--Sticky-Header--Smooth-Scroll.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    <link rel="stylesheet" href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/vertical-navbar-with-menu-and-social-menu.css">
	<!-- responsive datables -->
    <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Activity Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Info for program activity going here.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<body>
<div class="row container-fluid">
    <div class="col-lg-2 d-flex flex-column justify-content-between px-0" id="header">		<nav class="navbar navbar-expand-lg navbar-light d-flex flex-column px-0">
			<div id="m-navbar-brand" class="text-center">
			  <a class="navbar-brand m-0 p-2" href="assets/img/mob.jpg" data-toggle="lightbox">
					<img src="assets/img/mob.jpg" alt="" class="rounded-circle img-fluid mx-auto mb-3">
					<h2 class="h5"><?php echo $row['first_name'].' '.$row['last_name'];?></h2>
					<!-- <h1 class="h6">Farmer ID : IDHere</h1> -->
			  </a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse"
			   data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" 
			   aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			</div>
			<div id="m-navbar-menu" class="w-100">
			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav d-flex flex-column w-100">
          
			      <li class="nav-item">
			        <a class="nav-link font-weight-bold" href="home.php">home</a>
			      </li>
            <?php
        if($_SESSION['type'] == 'admin'){
            ?>
			      <li class="nav-item">
			        <a class="nav-link font-weight-bold" href="users.php">User</a>
			      </li>
				  <?php
		}
		if($_SESSION['type'] == 'govt' ||  $_SESSION['type'] == 'admin'){
            ?>
			
			      <li class="nav-item">
			        <a class="nav-link font-weight-bold" href="projects.php">Projects</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link font-weight-bold" href="regions.php">Regions</a>
			      </li>
			<li class="nav-item">
			        <a class="nav-link font-weight-bold" href="input.php">Inputs</a>
			      </li>
				  <?php
		}
		 if($_SESSION['type'] == 'govt' || $_SESSION['type'] == 'admin'||  $_SESSION['type'] == 'extension'){
            ?>
			  <li class="nav-item">
			        <a class="nav-link font-weight-bold" href="conditions.php">Conditions</a>
			      </li>
            <?php
        }
            ?>
			      <li class="nav-item">
			        <a class="nav-link font-weight-bold" href="stock_ii/logout.php">Log out</a>
			      </li>
			    </ul>
			  </div>	
			</div>
		</nav><div class="social-icons"><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-github"></i></a><a href="#"><i class="icon ion-social-linkedin"></i></a>
    </div>
    </div>