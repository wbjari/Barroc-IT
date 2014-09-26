<?php 
require '../templates/header.php'; 
require '../../config/config.php';	

if($_SESSION['role'] != 2)
{
	header('location: ../index.php');
}
?>
<div class="container">
	<div class="panel-text">
		<h1>Development panel: Projects</h1>
	</div>
	<div class="row">
		<table class="table table-striped table-bordered">
			<thead>
				<tr>	
					<th>Project name</th>
					<th>Costumer</th>
					<th>Email</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$result = mysqli_query($con, 'SELECT * FROM projects ORDER BY id ASC');

				while($row = mysqli_fetch_array($result)) {
					echo '<tr>';
					echo '<td>'. $row['projectname'] . '</td>';
					echo '<td>'. $row['customer'] . '</td>';
					echo '<td>'. $row['email'] . '</td>';
					echo '<td width=200>';
					echo '<a class="btn btn-default" href="view.php?id='.$row['id'].'">View</a>';
                    echo ' ';
                    echo '<a class="btn btn-success" href="edit.php?id='.$row['id'].'">Edit</a>';
                    echo ' ';
                    echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
					echo '</tr>';
				}

				mysqli_close($con);
			?>
			</tbody>
		</table>
	</div>
</div>