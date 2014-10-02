<?php 	require '../templates/header.php';
		require '../controllers/projectsController.php';

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
  	<form action="search.php" method="get" name="search">
		<input id="search-bar" type="text" name="search" >
		<input id="search-button" type="submit" value="Search" class="btn btn-primary">
	</form>
<table class='table table-striped'>
		<thead>
			<tr>
				<td class="col-sm-2">Project Name</td>
				<td class="col-sm-2">Maintenance Contract</td>
				<td class="col-sm-2">Activated invoices</td>
				<td class="col-sm-2">Deactivated invoices</td>
			</tr>
			</tr>
		</thead>
		<tbody>
		<?php
		while ($row = mysqli_fetch_assoc($r_projects)) 
        {
         echo '<tr>';
         echo '<td>' . $row['ProjectName'] . '</td>';
         echo '<td>' . $row['MaintenanceContract'] . '</td>';
         echo '<td> <a class="btn btn-primary"href="activate.php?cid=' . $row['CustomerNR'] . '"</a> View </td>';
         echo '<td> <a class="btn btn-primary"href="deactivate.php?cid=' . $row['CustomerNR'] . '"</a> View </td>';
         echo '</tr>';        
        }       
		?>
		</tbody>
</table>


<?php require'../templates/footer.php';?>