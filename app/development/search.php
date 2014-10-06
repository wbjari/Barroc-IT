<?php 	require '../templates/header.php';
		require '../controllers/projectsController.php';

if($_SESSION['role'] != 2 & 4)
{
	header('location: ../index.php');
}
$search = mysqli_real_escape_string($con, $_GET['search']);
$query = "SELECT * FROM projects, customers WHERE";
?>

<div class="panel-text">
    <h1>Development panel</h1>
</div>
  	<div class='float_btn'>
		<a class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
  	</div>
	<form action="search.php" method="get" name="search">
		<input id="search-bar" type="text" name="search">
		<input id="search-button" type="submit" value="Search" class="btn btn-primary">
	</form>
<table class='table table-striped'>
		<thead>
			<tr>
				<td class="col-sm-2">Company Name</td>
				<td class="col-sm-2">Contact Person</td>
				<td class="col-sm-2">Project Name</td>
				<td class="col-sm-2">Maintenance Contract</td>
				<td class="col-sm-2">Hardware</td>
				<td class="col-sm-2">Software</td>
				<td class="col-sm-2">Appointments</td>
				<td class="col-sm-2">Status Project</td>
				<td class="col-sm-2">Activated invoices</td>
				<td class="col-sm-2">Deactivated invoices</td>
			</tr>
			</tr>
		</thead>
		<tbody>
		<?php
		$search = trim($search);					
		if ($search){
			$query .= " ProjectNR = '". $search ."'
			OR CompanyName LIKE '%". $search ."%'
			OR ContactPerson LIKE '%". $search ."%' 
			OR ProjectName LIKE '%". $search ."%' 
			OR MaintenanceContract LIKE '%". $search ."%'
			OR Hardware LIKE '%". $search ."%'
			OR Software LIKE '%". $search ."%'
			OR Appointments LIKE '%". $search ."%'
			OR StatusProject LIKE '%". $search ."%'";
			$result = mysqli_query($con, $query);
			$row = mysqli_num_rows($result);
			
			if($row > 0){
				while($row = mysqli_fetch_assoc($result)){ 
					echo '<tr>';
					echo '<td>' . $row['CompanyName'] . '</td>';
					echo '<td>' . $row['ContactPerson'] . '</td>';
			        echo '<td>' . $row['ProjectName'] . '</td>';
			        echo '<td>' . $row['MaintenanceContract'] . '</td>';
			        echo '<td>' . $row['Hardware'] . '</td>';
			        echo '<td>' . $row['Software'] . '</td>';
			        echo '<td>' . $row['Appointments'] . '</td>';
			        echo '<td>' . $row['StatusProject'] . '</td>';
			        echo '<td> <a class="btn btn-primary"href="activate.php?cid=' . $row['ProjectNR'] . '"</a> View </td>';
			        echo '<td> <a class="btn btn-primary"href="deactivate.php?cid=' . $row['ProjectNR'] . '"</a> View </td>';
			        echo '</tr>';        
				}	
			}
		}							
		?>
		</tbody>
</table>
<div class='form-group'>
  	<a class='btn btn-default' href='index.php'>Back</a>
</div>

<?php require'../templates/footer.php';?>