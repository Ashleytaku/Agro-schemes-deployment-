<?php
require_once 'stock_ii/php_action/db_connect.php';


if($_POST) {	

  $UserName 		= $_POST['UserName'];
  $first 		    = $_POST['first'];
  $last 		    = $_POST['last'];
//   $UserImage 	= $_POST['UserImage'];
  $password 		= $_POST['password'];
  $password2 		= $_POST['password2'];
  $email 			  = $_POST['email'];
  $address 			= $_POST['address'];
  $phone 			  = $_POST['phone'];
  $Terms 			  = $_POST['Terms'];
  $UserType 		= 3;
  $UserStatus   = 1;
  $date         = date("Y-m-d H:i:s");
//   $UserStatus 	    = $_POST['UserStatus'];
$sqlCheck = "SELECT * FROM users";
$result = $connect->query($sqlCheck);
$row = $result->fetch_assoc();
$emailCheck = $row['email'];
$username = $row['username'];
if($UserName == $username){
  $valid = "the username selected has been taken already";
}else if($email == $emailCheck){
  $valid = "the email used is already in the system ! Please try again with another Email";
}else{


if ($password!=$password2){
      $valid = "Password do not match, both password should be same";
	}else{
  $password = password_hash($password, PASSWORD_DEFAULT);
	



				$sql = "INSERT INTO users (username, first_name, last_name, User_image, password, email, Address, Phone, Terms, type, status, joined_date) 
				VALUES ('$UserName', '$first', '$last', '$url', '$password', '$email', '$address', '$phone', '$Terms', '$UserType', '$UserStatus', '$date')";

				if($connect->query($sql) == TRUE) {
					
					$valid = "Successfully created an account <a href='login.php'>login</a>";
				} else {
					$valid = "Error while adding the members";
        }
      
  } // if in_array 
}




	$connect->close();

	
  
 
  
} // /if $_POST

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
</head>

<body style="background-color: rgb(7,102,28);">
    <nav class="navbar navbar-dark navbar-expand-md sticker" style="padding-top:30px;">
        <div class="container"><a class="navbar-brand" style="font-size:24px;" href="#">Smart Agro Schemes and deployment management</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php" target="_top">Home </a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="login.php">Features </a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="login.php" target="login.php">Sign in </a></li>
                       
                        </ul>
        </div>
        </div>
    </nav>
    <div class="login-card"><img class="profile-img-card" src="assets/img/avatar_2x.png">
        <p class="profile-name-card"> </p>
        <div class="error-message"><div id="add-User-messages">
</div>
	
  <?php if($valid) {
 
    echo '<div class="alert alert-success" role="alert">
    <i class="glyphicon glyphicon-exclamation-sign"></i>
    '.$valid.'</div>';										
    
  } ?>

</div>
        <h1 class="text-center">Register</h1>
        <form class="form-signin" action="registration.php" method="POST" enctype="multipart/form-data">
                   <div class="form-group"><label for="inputEmail3" >User Image</label>
                    <input type="file" class="form-control"  placeholder="User Image" id="UserImage" placeholder="User Name" value="<?php
                    if($_POST){
                      echo $_POST['UserImage'];
                    }
                    ?>" name="UserImage" class="file-loading" style="width:auto;" required></div>
                    <div class="form-group"><label for="name">First Name</label><input type="text" class="form-control" id="first" placeholder="Key" value="<?php
                    if($_POST){
                      echo $_POST['first'];
                    }
                    ?>" name="first" autocomplete="off" required></div>
                    <div class="form-group"><label for="name">Last Name</label><input type="text" class="form-control" id="last" placeholder="Player" name="last" value="<?php
                    if($_POST){
                      echo $_POST['last'];
                    }
                    ?>" autocomplete="off" required></div>
                    <div class="form-group"><label for="name">Company/User Name</label><input type="text" class="form-control" id="UserName" placeholder="Username" name="UserName" value="<?php
                    if($_POST){
                      echo $_POST['UserName'];
                    }
                    ?>" autocomplete="off" required></div>
                    <div class="form-group"><label for="name">Email</label><input type="email" class="form-control" id="email" placeholder="email" name="email" value="<?php
                    if($_POST){
                      echo $_POST['email'];
                    }
                    ?>" autocomplete="off" required></div>
                    <div class="form-group"><label for="password">Password</label><input type="password" class="form-control"  id="password" placeholder="Password" name="password"  autocomplete="off" required></div>
                    <div class="form-group"><label for="email">Retype Password</label><input type="password" class="form-control"  id="password2" placeholder="Password" name="password2" autocomplete="off" required></div>
                    <div class="form-group"><label for="email">Phone (whatsapp please follow format) +</label><input type="phone" class="form-control"  id="phone" placeholder="263771000000" name="phone" value="<?php
                    if($_POST){
                      echo $_POST['phone'];
                    }
                    ?>" autocomplete="off" required></div>
                    <div class="form-group"><label for="email">Physical address</label><input type="text" class="form-control" id="address" placeholder="Address" name="address" value="<?php
                    if($_POST){
                      echo $_POST['address'];
                    }
                    ?>" autocomplete="off" required></div>
                    <div class="form-group"><input type="hidden" class="form-control"  id="Terms" placeholder="Terms" name="Terms" autocomplete="off" value="<?php
                    if($_POST){
                      echo $_POST['Terms'];
                    }else{
                      echo 'agree';
                    }
                    ?>" required></div>
            <div class="checkbox">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" id="formCheck-1">
                <label class="form-check-label" for="formCheck-1">Remember me</label>
                </div>
    </div>
    <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit">Sign up</button>
    </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Header-Blue--Sticky-Header--Smooth-Scroll-1.js"></script>
    <script src="assets/js/Header-Blue--Sticky-Header--Smooth-Scroll.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
    <script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
    <script src="assets/js/vertical-navbar-with-menu-and-social-menu.js"></script>
</body>

</html>ss