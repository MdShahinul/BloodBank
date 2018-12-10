<?php if (!isset($_SESSION)) {session_start(); } ?>
<?php 

	// if($_SESSION('donorstatus')=="") {
	// echo "<script>location.replace('login.php');</script>";
	// }

	if(!$_SESSION['donorstatus'])
	{
		header("location:../login.php");
	}
 ?>
 <?php include('function.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="animate.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
			<div>
				<li>
					<div class="wrap">
					<ul class="nav">
					<li><a href="updateprofile.php">Update Profile</a></li>    
					<li><a href="changepassword.php">Change password</a></li>
		            <li><a href="viewdonations.php">View Donations</a></li>
		            <li><a href="viewrequest.php">View Requestes</a></li>
		            <li><a href="blooddonated.php">blood Donate</a></li>
		            <li><a href="logout.php">log Out</a></li>
            	</ul>
					</div>
				</li>
			</div>
	
			<h1> user panel </h1>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="custom.js"></script>
	<script src="js/modernizr-custom.js"></script>
</body>
</html>