<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Document</title>
</head>
<body>
	<?php
		unset($_SESSION['email']);
		unset($_SESSION['donorstatus']);
		header("location:../index.php");
	?>
	
</body>
</html>