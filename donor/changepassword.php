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
 <?php 
 	if (isset($_POST["btn"])) {	
	 	$cn = connection(); 
	 		 $s = "SELECT * FROM donorregistration where email = '". $_SESSION["email"] ."' and pwd ='" . $_POST["old"] ."' "; 
	 	$result = mysqli_query($cn, $s); 
	 	$r = mysqli_num_rows($result); 

	 	if ($r> 0) {
		 	$cn = connection(); 
	 			 $s ="UPDATE donorregistration set pwd = '".$_POST["confirm_password"]."' where email = '". $_SESSION["email"]. "' "; 
	 		$result = mysqli_query($cn, $s);
	 		mysqli_close($cn);  
	 		echo"<script>alert('Password Update Successfull !');</script>"; 
 	 	}else{
 	 	echo"<script>alert('Old Password Incorrect'); </script>";
 	 	} 	
 	 }
 ?>

<?php include('header.php'); ?>


	<div class="container bodydesign">
		<h1 style="margin-left: 100px;">Change Password</h1>
		<form action="" id="registerForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
		<div class="form-group ">
	        <label for="old" class="control-label col-md-3">Old Password</label>
	          <div class="col-md-5">
	            <input type="password" class="form-control" id="old" name="old" required id="old" placeholder="Old Password">
	          </div>
      	</div>

	   <div class="form-group ">
        <label for="Password" class="control-label col-sm-3">New Password</label>
          <div class="col-sm-5">
            <input type="password" class="form-control" id="Password" name="Password" required id="Password" placeholder="new password">
          </div>
      </div>

      <div class="form-group ">
        <label for="confirmPassord" class="control-label col-sm-3">Confirm Password</label>
          <div class="col-sm-5">
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required id="confirmPassord" placeholder="confirm Password">
          </div>
      </div>
      <div class="">
        <label for="" class="col-sm-3"></label>
        <button type="submit" name="btn" class="btn btn-primary">SAVE</button>
      </div>
		</form>

</div>

<script>  // Password check 
    var password = document.getElementById("Password") , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
      } else {
        confirm_password.setCustomValidity('');
      }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;   
</script>

	
<?php include('footer.php'); ?>