<?php include('admin/function.php'); 

	$cn = connection(); 
	if (isset($_POST["btn"])) {
		$s = "INSERT INTO bloodrequest(name, gender, age ,mobile, email, bg_id, req_data, details) values('" . $_POST["name"] ."', '" . $_POST["gender"] ."', '" . $_POST["age"] ."', '" . $_POST["mobile"] ."', '" . $_POST["email"] ."', '" . $_POST["bg"] ."', '" . $_POST["date"] ."', '". $_POST["text"] ."')"; 

		$result = mysqli_query($cn, $s); 
		if ($result > 0) {
       	 echo "<script>alert('Your Request Send');</script>";
        }
        else
        {
         echo "<script>alert('Your Request Send Fails !');</script>";
        }      
	}
?>


<?php include('header.php'); ?> 

<div class="container"> 
<h1 style="margin-left: 100px;">Blood Request</h1> 
	<form class="form-horizontal" method="POST" id="registerForm" enctype="multipart/form-data">
	    <div class="form-group ">
		    <label for="name" class="control-label col-md-3">Name</label>
			    <div class="col-md-5">
			    <input type="text" class="form-control" name="name" required id="name" placeholder="Name">
		    </div>
	    </div>
	   <div class="form-group">
	      <label class="control-label col-sm-3" for="gender">Gender</label>
	        <div class="col-sm-5">
	          <label class="radio inline col-sm-2" for="gender-0">
	            <input name="gender" id="gender-0" value="Male" name="gender" checked="checked" type="radio">Male
	          </label>
	          <label class="radio inline col-sm-2" for="gender-1">
	            <input name="gender" id="gender-1" value="Female" name="gender" type="radio">Female
	          </label>
	        </div>
	    </div>

	  	 <div class="form-group">
	      <label for="age" class="control-label col-sm-3">AGE </label>
	        <div class="col-sm-5">
	          <input type="text" class="form-control" name="age"  required id="age" placeholder="age"  pattern="[0-9]{2,2}" title="please enter only  numbers between 2 to 2 for age">
	        </div>
	    </div>
	  <!-- Select Option Select Blood Group -->
		<div class="form-group">
	        <label for="mobileNo" class="control-label col-sm-3">Mobile No</label>
	          <div class="col-sm-5">
	            <input type="text" class="form-control col-sm-5" name="mobile" required pattern="[0-9]{10,11}" id="mobileNo" placeholder="Moblie No">
	          </div>
	    </div>
		<div class="form-group">
	        <label for="email" class="col-sm-3 control-label">Email :</label>
	          <div class="col-sm-5">
	            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
	          </div>
	    </div>

	  	<div class="form-group">
	      <label for="bloodgroup" class="control-label col-sm-3">Blood Broup</label>
	        <div class="col-sm-5">
	         <select class="form-control" id="bloodgroup" name="bg" required=""><option value="">Select</option>
	        
	             <?php
	                $s= "select * from bloodgroup"; 
	                $result = mysqli_query($cn, $s); 
	                $s = mysqli_num_rows($result); 
	                while ($data = mysqli_fetch_array($result))
	                 {
	                  if(isset($_POST["show"])&& $data[0]==$_POST["s1"])
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
	    <div class="form-group">
		  <label for="date" class="control-label col-md-3">Required Date</label>
		  	<div class="col-md-5">
		  	 <input class="form-control" type="date" name="date" required="" value="2018-02-10" id="date">
		   </div>
		</div>
		<div class="form-group">
		  <label for="details" class="control-label col-md-3">Details</label>
			<div class="col-md-5">
			  <textarea class="form-control" placeholder="Details" required="" id="details" name="text" rows="3"></textarea>
			</div>
		</div>
		 <div class="">
        <label for="" class="col-sm-3"></label>
        <button type="submit" name="btn" class="btn btn-primary">Blood Request</button>
      </div>

	</form>
</div>	



<?php include('footer.php'); ?>

