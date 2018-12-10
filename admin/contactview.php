<?php include('function.php'); ?>

<?php include('header.php'); ?>
<div class="container" style="min-height: 400px; width: 1200px;">
	<h1 style="margin-left: 100px;"> Contact List View</h1>
		<table class="table">
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Mobile</th>
				<th>Email</th>
				<th>Comment</th>
			</tr>

			<?php
 			$cn=connection();
			$s = "Select * from contact"; 
			$result = mysqli_query($cn,$s);
			$x = 1; 
			while($row = mysqli_fetch_array($result)) {
			?>			
			
			<tr>
				<td><?php echo $x++; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['mobile'];?></td>
				<td><?php echo $row['email'];?></td>
				<td><?php echo $row['comment'];?></td>
			</tr>
		<?php
			}
		?>
		</table>	

	</div>


</div>

<?php include('footer.php'); ?>