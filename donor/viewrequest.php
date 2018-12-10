<?php if (!isset($_SESSION)) {session_start(); } ?>
<?php include('function.php');?>

<?php 
	if(!$_SESSION['donorstatus'])
	{
		header("location:../login.php");
	}
 ?>

<?php include('header.php');?>
	
	<div class="container" style="min-height: 400px; width: 1200px;">
		<h1 style="text-align: center;">View Request</h1>
		<table class="table">
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Gender</th>
				<th>Mobile</th>
				<th>Email</th>
				<th>Blood Group</th>
				<th>Required Date</th>
			</tr>

			<?php
 			$cn=connection();
			$s = "SELECT br.name, br.gender, br.mobile, br.email, br.req_data, bg.name As bg_name from bloodrequest AS br INNER JOIN bloodgroup AS bg ON br.bg_id = bg.blood_id"; 
			$result = mysqli_query($cn,$s);
			$x = 1; 
			while($row = mysqli_fetch_array($result)) {
			?>			
			
			<tr>
				<td><?php echo $x++; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['gender'];?></td>
				<td><?php echo $row['mobile'];?></td>
				<td><?php echo $row['email'];?></td>
				<td style="color:red;"><?php echo $row['bg_name']; ?></td>
				<td><?php echo $row['req_data'];?></td>
			</tr>
		<?php
			}
		?>
		</table>	

	</div>

<?php include('footer.php');?>
