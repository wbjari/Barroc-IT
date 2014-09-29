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
<div class='float_btn'>
	<a class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
 </div>
<div class="row">
	<table class="table table-striped table-bordered">
		<thead>
			<tr>	
				<th>Project NR</th>
				<th>Customer NR</th>
				<th>Maintenance Contract</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$result = mysqli_query($con, 'SELECT * FROM projects ORDER BY ProjectNR ASC');

			while($row = mysqli_fetch_array($result)) {
				echo '<tr>';
				echo '<td>'. $row['ProjectNR'] . '</td>';
				echo '<td>'. $row['CustomerNR'] . '</td>';
				echo '<td>'. $row['MaintenanceContract'] . '</td>';
				echo '<td>'. $row['StatusProject'] . '</td>';
				echo '<td width=170>';
				echo '<a class="btn btn-success" href="view.php?id='.$row['ProjectNR'].'">View</a>';
                echo ' ';
                echo '<a class="btn btn-danger" href="deactivate.php?id='.$row['ProjectNR'].'">Deactivate</a>';
				echo '</tr>';
			}

			mysqli_close($con);
		?>
		</tbody>
	</table>
</div>