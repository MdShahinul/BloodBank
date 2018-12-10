<?php include('admin/function.php'); 
 $cn =connection(); 
?>

<?php include('header.php'); ?>	
<div class="container bodydesign" style="min-height: 400px;">
	<h1 style="margin-left: 100px; ">Search All </h1>	
	<form action="" method="POST"  class="form-horizontal" enctype="multipart/form-data">		
		<div class="form-group">
	      <label for="exampleInputName2" class="control-label col-md-3">Blood Broup Name</label>
	      <div class="col-md-4">
	      <select class="form-control" name="bg" required=""><option value="">Select</option>
      	
	      <?php 
	       // $cn =connection(); 
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
			
		     <div class="">
		        <label for="" class="col-sm-1"></label>
		        <button type="submit" name="btn" class="btn btn-primary">Search</button>
		     </div>
		     </div>
	</form>
	<div class="col-md-12">
		<table class="table" >
			
			<tr>
				<th>Picture</th>
				<th>Name</th>
				<th>Blood Group</th>
				<th>Gender</th>
				<th>Mobile</th>
				<th>Email</th>
			</tr>
		
			

		<?php
			 $cn = connection(); 	
			if (isset($_POST["btn"])) {
				 $s = "SELECT dr.donar_id, dr.name, dr.gender, dr.age, dr.mobile, dr.email, dr.pwd, dr.pic, bg.blood_id,bg.name AS bg_name FROM donorregistration AS dr, bloodgroup AS bg WHERE dr.bg_id = '" . $_POST["bg"] ."' AND dr.bg_id = bg.blood_id";;
				$result=mysqli_query($cn,$s);
				$r=mysqli_num_rows($result);
			while($data=mysqli_fetch_array($result))
				{ ?>			
					<tr>
						<th><?php echo "<img src ='doner_pic/". $data['pic'] ."' height='100px' width='100px'>"; ?>
						<th><?php echo $data['name'];?></th>
						<th style="color:red; text-align: center;style="color:red; text-align: center;><?php echo $data['bg_name'];?></th>
						<th style="text-align: center;"><?php echo $data['gender'];?></th>
						<th><?php echo $data['mobile']; ?></th>
						<th><?php echo $data['email']; ?></th>		
					</tr>			
				<?php 
				} }else{
				 $cn = connection(); 
				$s = "SELECT dr.donar_id, dr.name, dr.gender, dr.age, dr.mobile, dr.email, dr.pwd, dr.pic, bg.blood_id,bg.name AS bg_name FROM donorregistration AS dr INNER JOIN bloodgroup AS bg ON dr.bg_id = bg.blood_id";
				$result=mysqli_query($cn,$s);
				while($data=mysqli_fetch_array($result))
					{ ?>			
						<tr>
							<th><?php echo "<img src ='doner_pic/". $data['pic'] ."' height='100px' width='100px'>"; ?>
							<th><?php echo $data['name'];?></th>
							<th style="color:red;"><?php echo $data['bg_name'];?></th>
							<th><?php echo $data['gender'];?></th>
							<th><?php echo $data['mobile']; ?></th>
							<th><?php echo $data['email']; ?></th>		
						</tr>			
					<?php 
					} }?>		
		</table>
	</div>
	</div>

</div>
<?php include('footer.php'); ?>

