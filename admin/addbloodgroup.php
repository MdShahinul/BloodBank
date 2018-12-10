
<?php include('header.php'); ?>

		<div class="container" style="min-height: 400px; width: 1200px;">
			<h1 style="margin-left: 100px;">Add Blood Group</h1>
				<form class="form-horizontal" method="POST">
					  <div class="form-group">
					    <label for="bloodName" class="control-label col-md-3">Blood Group</label>
					    <div class="col-md-5">
					    	<input type="text" class="form-control" name="name" required id="bloodName" placeholder="Blood Name">
					    </div>
					  </div>
					 <div class="">
				        <label for="" class="col-md-3"></label>
				        <div class="col-sm-5">
				        	<button type="submit" name="btn" class="btn btn-primary">Save</button>
				        </div>
				     </div>
				</form>
		</div>

<?php
if(isset($_POST["btn"]))
{
	$cn=mysqli_connect("localhost","root","","bloodbank");
	 // $cn=makeconnection();
	$s="insert into bloodgroup(name) values('" . $_POST["name"] . "')";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Record Save');</script>";
}
?>
<?php include('footer.php'); ?>