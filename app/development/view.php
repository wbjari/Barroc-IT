<?php 
require '../templates/header.php'; 
require '../../config/config.php';	

if($_SESSION['role'] != 2)
{
	header('location: ../index.php');
}
?>
<div class="panel-text">
	<h1>Projects</h1>
</div>
<div class="row">
	<table class="table table-striped table-bordered">
		<thead>
			<tr>	
				<th>Project name</th>
				<th>Company name</th>
				<th>Maintenance Contract</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$result = mysqli_query($con, 'SELECT * FROM projects ORDER BY id ASC');

			while($row = mysqli_fetch_array($result)) {
				echo '<tr>';
				echo '<td>'. $row['projectname'] . '</td>';
				echo '<td>'. $row['companyname'] . '</td>';
				echo '<td>'. $row['maintenancecontract'] . '</td>';
				echo '<td>'. $row['status'] . '</td>';
				echo '</tr>';
			}

			mysqli_close($con);
		?>
		</tbody>
	</table>
	<div class="form-actions">
      	<a class="btn btn-success" href="index.php">Back</a>
   	</div>
</div>
