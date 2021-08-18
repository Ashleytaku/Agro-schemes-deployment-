<?php 
require 'stock_ii/php_action/db_connect.php';
session_start();




if(isset($_SESSION['userId'])) {
	$userId = $_SESSION['userId'];
              
				      	$sql = "SELECT user_id, username, Address, Phone, email, type  FROM users WHERE user_id = {$userId} AND status = 1";
								$result = $connect->query($sql);

								$row = $result->fetch_array();
								if($row['type'] == 'farmer'){
	header('location: home.php');	
								}else if($row['type'] == 'goldcoast'){
									header('location: home.php');
								}else{
									header('location: home.php');
								}
}

$errors = array();

if($_POST) {		

	$email = $_POST['email'];
	$password = $_POST['password'];

	if(empty($email) || empty($password)) {
		if($email == "") {
			$errors[] = "email is required";
		} 

		if($password == "") {
			$errors[] = "Password is required";
		}
	} else {
		$sql = "SELECT * FROM users WHERE email = '$email' ";
		$result = $connect->query($sql);

		if($result->num_rows == 1) {
			$password = $password;
			// exists
			$mainSql = "SELECT * FROM users WHERE email = '$email'";
			$mainResult = $connect->query($mainSql);

			if($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				if(password_verify($password, $value['password']))
					{
				$user_id = $value['user_id'];
				$type    = $value['type'];
				$username= $value['username'];
				$region  = $value['region_id'];


				// set session
				$_SESSION['userId']    = $user_id;
				$_SESSION['type']      = $type;
				$_SESSION['username']  = $username;
				$_SESSION['user_id']   = $user_id;
				$_SESSION['region']    = $region;
				

				

				// header('location: index.php?shop='.$dbname.'');	
				header("location: index.php?shop=$dbname");
					}else{
						$errors[] = "Incorrect password ";
					}
			} else{
				
				$errors[] = "Incorrect email/password combination";
			} // /else
		} else {		
			$errors[] = "email does not exists";		
		} // /else
	} // /else not empty email // password
	
} // /if $_POST

// require_once 'header.php';
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
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="registration.php" target="login.php">Sign up </a></li>
                       </ul>
        </div>
        </div>
    </nav>
    <div class="login-card"><img class="profile-img-card" src="assets/img/avatar_2x.png">
	<div class="messages">
							<?php if($errors) {
								foreach ($errors as $key => $value) {
									echo '<div class="alert alert-warning" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									'.$value.'</div>';										
									}
								} ?>
						</div>
        <p class="profile-name-card"> </p>
        <form class="form-signin" action="<?php echo $_SERVER['PHP_SELF'] ?>?shop=<?php echo $dbname;?>" method="post">
        <span class="reauth-email"> </span>
        <input class="form-control" type="email" id="inputEmail" required=""  name="email" placeholder="Email address" autofocus="">
        <input class="form-control" type="password" id="inputPassword" required=""  name="password" placeholder="Password">
            <div class="checkbox">
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Remember me</label></div>
    </div>
    <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit">Sign in</button>
    </form>
    
    <a class="forgot-password" href="registration.php">Sign up</a>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Header-Blue--Sticky-Header--Smooth-Scroll-1.js"></script>
    <script src="assets/js/Header-Blue--Sticky-Header--Smooth-Scroll.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
    <script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
    <script src="assets/js/vertical-navbar-with-menu-and-social-menu.js"></script>
</body>

</html>