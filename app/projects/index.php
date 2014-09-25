<?php require '../templates/header.php'; 
	require '../../config/config.php';	
?>
<div class="container">
	<div class="row">
		<h3>Projects</h3>
	</div>
	<div class="row">
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Project ID</th>
					<th>Project name</th>
					<th>Costumer</th>
					<th>Email</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$result = mysqli_query($con, 'SELECT * FROM projects ORDER BY id ASC');

				while($row = mysqli_fetch_array($result)) {
					echo '<tr>';
					echo '<td>'. $row['id'] . '</td>';
					echo '<td>'. $row['projectname'] . '</td>';
					echo '<td>'. $row['customer'] . '</td>';
					echo '<td>'. $row['email'] . '</td>';
					echo '</tr>';
				}

				mysqli_close($con);
			?>
			</tbody>
		</table>
	</div>
</div>