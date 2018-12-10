<?php if(!isset($_SESSION)) {session_start();}  ?>
<?php

if(!$_SESSION['donorstatus'])
{
	header("location:../login.php");
}
?>
<?php include('function.php'); ?>
<?php
	
	$cn = connection(); 			
		 $s="select * from donorregistration where email='" . $_SESSION["email"] . "'";		
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
	$data=mysqli_fetch_array($q);
	$name=$data['name'];
	$gender=$data['gender'];
	$age=$data['age'];
	$mobile=$data['mobile'];
	$email = $data['email']; 
	$pic = $data['pic']; 
	//echo $name;
	mysqli_close($cn);
	

?> 

<?php include('header.php'); ?>

	<div class="container bodydesign">
		<h1 style="margin-left: 100px; "> Edit Profile</h1>
		<form action="" class="form-horizontal" method="POST" enctype="">
			<div class="col-md-8">
				<div class="form-group">
					<label for="name" class="control-label col-md-3">Name:</label>
					<div class="col-md-5">
						<input type="text" class="form-control" name="name" placeholder="name" required id="name" value="<?php echo @$name; ?>">
					</div>
				</div>
				<div class="form-group ">
			      <label for="email" class="col-md-3 control-label">Email</label>
			        <div class="col-md-5">
			          <input type="email" class="form-control" disabled name="email" required id="email" placeholder="" readonly="" value="<?php echo @$email;  ?>">
			        </div>
	   			</div> 
	   			<div class="form-group">
			      <label class="control-label col-md-3" for="gender">Gender</label>
			      	<div class="col-md-5">
			          <label class="radio inline col-md-3" for="gender-0">
			            <input name="gender" id="gender-0" value="Male" name="gender" checked="checked" type="radio" value="<?php if($gender=="male"){ echo "checked" ;}  ?>">Male
			          </label>
			          <label class="radio inline col-md-1" for="gender-1">
			            <input name="gender" id="gender-1" value="Female" name="gender" type="radio" value="<?php if($gender=="female"){ echo "checked" ;}  ?>">Female
			          </label>
			        </div>
			    </div>
	   			<div class="form-group">
					<label for="Age" class="control-label col-md-3">Age:</label>
					<div class="col-md-5">
						<input type="text" class="form-control" name="age" placeholder="Age" required id="Age" value="<?php echo @$age;  ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="mobile" class="control-label col-md-3">Mobile No:</label>
					<div class="col-md-5">
						<input type="text" class="form-control" name="mobile" placeholder="mobile" required id="mobile" value="<?php echo @$mobile;  ?>">
					</div>
				</div>
				<div class="">
			        <label for="" class="col-sm-3"></label>
			        <button type="submit" name="btn" class="btn btn-primary">Update</button>
		     	</div>
			</div>

			<div class="col-md-2">
				<label for="">profile Picture</label>
				<img src="../doner_pic/<?php echo @$pic; ?>" alt="new" height="100px" width="100px " >
				<input type="file" name="pic" placeholder="pic" value="<?php {echo @$pic;} ?>">
				<!-- <input type="text" value="<?php {echo @$pic;} ?>" > -->
			</div>
			
		</form>
	</div>

<?php
	
	if(isset($_POST["btn"])) 
	{
		$cn=connection();
		echo $s="update donorregistration set name='" .$_POST["name"]. "' ,gender='" .$_POST["gender"]."' , age='" .$_POST["age"]. "',mobile='" .$_POST["mobile"]. "' where email='" .$_SESSION["email"]. "'";
		$r=mysqli_query($cn,$s);
		mysqli_close($cn);
	echo "<script>alert('Record update');</script>";
}
?> 


<?php include('footer.php'); ?>