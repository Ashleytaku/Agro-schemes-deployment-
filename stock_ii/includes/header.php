<?php require 'php_action/core.php'; ?>

<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Homeland</title>
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="description" content=""/>
  
<!--===============================================================================================-->	
	
<link rel="shortcut icon" href="../images/neatico.png" type="image/x-icon">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
  <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->




<!-- jquery -->
<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>
  <!-- sidebar -->
  
<!-- Material Design for Bootstrap fonts and icons -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

 <!-- Material Design for Bootstrap CSS -->
 <link rel="stylesheet" href="assests/bootstrap-material-design-dist/css/bootstrap-material-design.min.css" >
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
  
<!-- responsive datables -->
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css" rel="stylesheet">
    <style>
body { 
  background-image: url('../images/bghome.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center; 
}
</style>
  </head>

  <body>


<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
<a class="navbar-brand" href="../index.php?shop=<?php echo $dbname;?>" style="color:
                    <?php if($data['nav_textcolor'] == ''){echo 'black';}else{
                  echo $data['nav_textcolor'];
                } ?>">
                Homeland
                    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li style="font-weight : bold" class="nav-item">
        <a style="font-weight : bold" class="nav-link" href="dashboard.php?shop=<?php echo $dbname;?>" style="color : black;">Dashboard</a>
      </li>
      <?php
      if($_SESSION['type'] == 'goldcoast'){
      ?>
      <li style="font-weight : bold" class="nav-item">
        <a style="font-weight : bold" class="nav-link " href="User.php?shop=<?php echo $dbname;?>" style="color : black;">Users</a>
      </li>
      <!-- <li style="font-weight : bold" class="nav-item">
        <a style="font-weight : bold" class="nav-link " href="report.php?shop=<?php echo $dbname;?>" style="color : black;">Reports</a> -->
      <!-- </li>
      <li style="font-weight : bold" class="nav-item">
        <a style="font-weight : bold" class="nav-link " href="notices.php?shop=<?php echo $dbname;?>" style="color : black;">Notices</a>
      </li> -->
     
      <li style="font-weight : bold" class="nav-item">
        <a style="font-weight : bold" class="nav-link " href="categories.php?shop=<?php echo $dbname;?>" style="color : black;">Areas</a>
      </li>
      <li style="font-weight : bold" class="nav-item">
        <a style="font-weight : bold" class="nav-link " href="brand.php?shop=<?php echo $dbname;?>" style="color : black;">Stands</a>
      </li>
      <!-- <li style="font-weight : bold" class="nav-item">
        <a style="font-weight : bold" class="nav-link " href="product.php?shop=<?php echo $dbname;?>" style="color : black;">Stand Specifications</a>
      </li> -->
      <?php
      }
      ?>
      <!-- <li style="font-weight : bold" class="nav-item">
        <a style="font-weight : bold" class="nav-link " href="orders.php?o=manord&shop=<?php echo $dbname;?>" style="color : black;">Stand inquiries</a>
      </li> -->
      <!-- <li style="font-weight : bold" class="nav-item">
        <a style="font-weight : bold" class="nav-link " href="../account.php?shop=<?php echo $dbname;?>#tab-2" style="color : black;">Messenger</a>
      </li> -->
      <li style="font-weight : bold" class="nav-item dropdown">
        <a style="font-weight : bold" class="nav-link dropdown-toggle" style="color : black;" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="setting.php?shop=<?php echo $dbname;?>" style="color : black;">Settings</a>
          <a class="dropdown-item" href="logout.php?shop=<?php echo $dbname;?>" style="color : black;">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>



	<div class="container text-secondary " >
    <br><br>