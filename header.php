<?php
require_once 'stock_ii/php_action/core.php';
if(isset($_SESSION['userId'])){
    $member_id = $_SESSION['userId']; // you can your integerate authentication module here to get logged in member
    }else{
  $member_id = 0; 
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SASDM</title>
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
</head>

<body>
    <div id="home">
        <div class="header-blue" style="background-color: rgb(7,102,28);">
            <nav class="navbar navbar-dark navbar-expand-md sticker" style="padding-top:30px;">
                <div class="container"><a class="navbar-brand" style="font-size:24px;" href="#">
                Smart Agro Schemes Deployment and Management
            </a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div
                        class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php" target="_top">Home </a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="login.php">Features </a></li>
                        <?php
        if(!($_SESSION['userId'])){
            ?>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="login.php" target="_top">Sign in </a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="registration.php">Sign up </a></li>
                        <?php
        }else{
            ?>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="login.php" target="_top">View activity</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="stock_ii/logout.php">Sign out </a></li>
                        <?php
        }
              ?>
                        </ul>
                </div>
        </div>
        </nav>