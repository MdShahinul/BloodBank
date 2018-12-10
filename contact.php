<?php include('admin/function.php');  
	$cn = connection(); 
	if (isset($_POST["btn"])) {
		echo $s="INSERT INTO contact (name, mobile, email, comment) values('" . $_POST["name"] ."', '" . $_POST["mobile"] ."', '" . $_POST["email"] ."', '" . $_POST["comment"] ."')"; 
		$result = mysqli_query($cn, $s);
		mysqli_close($cn); 
		if ($result > 0) {
		 	echo "<script> alert('Your information has been sent') </script>";
		 } else{
		 	echo "<script> alert('don't send your information') </script>";
		 }
	}
?>

<?php include('header.php'); ?>
	
	<div class="container">
		<h1 style="margin-left: 100px; ">Contact Us</h1>
		<form action=""  class="form-horizontal" method="post">
	
		<div class="form-group">
	      <label for="name" class="control-label col-sm-3">Name</label>
		     <div class="col-sm-5">	      
		      <input type="text" class="form-control" name="name" required id="name" placeholder="name">
		    </div>
   		</div>

		<div class="form-group">
	      <label for="mobileNo" class="control-label col-sm-3">Mobile No</label>
		    <div class="col-sm-5">
		    	<input type="text" class="form-control" name="mobile" required pattern="[0-9]{10,11}" id="mobileNo" placeholder="moblie no">
		    </div>
   		</div>
   		<div class="form-group">
	        <label for="email" class="col-sm-3 control-label">Email :</label>
	          <div class="col-sm-5">
	            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
	          </div>
     	 </div>

		<div class="form-group"><br>
		  <label class="control-label col-sm-3" for="Comment">Comment</label>
		  	<div class="col-sm-5">
			  <textarea class="form-control" placeholder="comment" id="Comment" name="comment" rows="5">
			  </textarea>
			</div>
		</div>

		<div class="">
	       <label for="" class="col-sm-3"></label>
	       <button type="submit" name="btn" class="btn btn-primary">Contact US</button>
	    </div>


		</form>
	</div>


	<?php include('footer.php'); ?>
