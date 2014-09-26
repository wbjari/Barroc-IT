<?php 
require '../templates/header.php'; 
require '../../config/config.php';	

if($_SESSION['role'] != 2)
{
	header('location: ../index.php');
}
?>
<div class="panel-text">
	<h1>Development panel</h1>
</div>
<div class="row">
	<table class="table table-striped table-bordered">
		<thead>
			<tr>	
				<th>Project name</th>
				<th>Company name</th>
				<th>Maintenance Contract</th>
				<th>Status</th>
				<th>Action</th>
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
				echo '<td width=170>';
				echo '<a class="btn btn-success" href="view.php?id='.$row['id'].'">View</a>';
                echo ' ';
                echo '<a class="btn btn-danger" href="deactivate.php?id='.$row['id'].'">Deactivate</a>';
				echo '</tr>';
			}

			mysqli_close($con);
		?>
		</tbody>
	</table>
</div>