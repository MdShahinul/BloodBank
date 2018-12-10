<?php include('function.php'); ?>

<?php 
	if(isset($_POST["btn"])){
		$cn = connection(); 
		$s = "DELETE FROM bloodgroup WHERE blood_id='" .$_POST["s2"] ."' "; 
		$result = mysqli_query($cn, $s);
			echo "<script> alert('Delete Successfull !'); </script>";
	} ?>
	
<?php include('header.php'); ?>	

<div class="container" style="min-height: 400px; width: 1200px;"> 
	<h1 style="margin-left: 100px; ">Delete Blood Group</h1>
	<form action="" method="POST" class="form-horizontal">	
		<div class="form-group">
	   	 <label for="blood" class="control-label col-md-3">Select Blood Broup</label>
		    <div class="col-md-5">
			    <select class="form-control" id="blood" name="s2" required=""><option value="">Select</option>			  
					  	<?php
					  	 	$cn=mysqli_connect("localhost","root","","bloodbank");
					  		// $con =makeconnection(); 
					  		$s= "select * from bloodgroup"; 
					  		$result = mysqli_query($cn, $s); 
					  		$s = mysqli_num_rows($result); 

					  		while ($data = mysqli_fetch_array($result))
					  		 {
					  			if(isset($_POST["show"])&& $data[0]==$_POST["s2"])
									{
									echo "<option value=$data[0] selected>$data[1]</option>";
									}
									else
									{
										echo "<option value=$data[0]>$data[1]</option>";
									}	
					  		}
						mysqli_close($cn); 
					  	?>
				</select>
			</div>
		</div>
		<div class="">
			<label for="" class="col-md-3"></label>
			<div class="col-md-5">
				<button type="submit" name="btn" class="btn btn-primary">Delete</button>
			</div>
		</div>

	</form>

</div>


<?php include('footer.php'); ?>

