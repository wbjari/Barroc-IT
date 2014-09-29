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
				<th>Project NR</th>
				<th>Company NR</th>
				<th>Project Name</th>
				<th>Maintenance Contract</th>
				<th>Hardware</th>
				<th>Software</th>
				<th>Appointments</th>
				<th>Status Project</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$result = mysqli_query($con, 'SELECT * FROM projects ORDER BY ProjectNR ASC');

			while($row = mysqli_fetch_array($result)) {
				echo '<tr>';
				echo '<td>'. $row['ProjectNR'] . '</td>';
				echo '<td>'. $row['CustomerNR'] . '</td>';
				echo '<td>'. $row['ProjectName'] . '</td>';
				echo '<td>'. $row['MaintenanceContract'] . '</td>';
				echo '<td>'. $row['Hardware'] . '</td>';
				echo '<td>'. $row['Software'] . '</td>';
				echo '<td>'. $row['Appointments'] . '</td>';
				echo '<td>'. $row['StatusProject'] . '</td>';
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
