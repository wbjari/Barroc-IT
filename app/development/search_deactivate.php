<?php 	
require '../templates/header.php';
require '../controllers/projectsController.php';

// If the userrole isn't 2 OR 4: user goes back to index page
if($_SESSION['role'] != (2 || 4)) 
{
	header('location: ../index.php');
}

$id = $_SESSION['checkid'];
$search = mysqli_real_escape_string($con, $_GET['search_deactivate']);
$query = "SELECT * FROM projects WHERE BKR = 'Y' AND "; 
?>

<div class="panel-text">
    <h1>Development panel</h1>
</div>

<!-- Logout button -->
<div class='float_btn'>
	<a class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
</div>

<!-- Search button -->
<form action="search_deactivate.php" method="get" name="search_deactivate">
	<input id="search-bar" type="text" name="search_deactivate">
	<input id="search-button" type="submit" value="Search" class="btn btn-primary">
</form>

<table class='table table-striped'>
	<thead>
		<tr>
		<td class="col-sm-2">Project Name</td>
        <td class="col-sm-2">Maintenance Contract</td>
        <td class="col-sm-2">Hardware</td>
        <td class="col-sm-2">Software</td>
        <td class="col-sm-2">Appointments</td>
        <td class="col-sm-2">Edit</td>
        <td class="col-sm-2">Activate</td>
		</tr>
		</tr>
	</thead>
	<tbody>
	<?php
	$search = trim($search);					
	if ($search){
		$query .= " ProjectNR = '". $search ."'
		OR ProjectName LIKE '%". $search ."%'
		OR MaintenanceContract LIKE '%". $search ."%'
		OR Hardware LIKE '%". $search ."%'
		OR Software LIKE '%". $search ."%'
		OR Appointments LIKE '%". $search ."%'";
		$result = mysqli_query($con, $query);
		$row = mysqli_num_rows($result);
		
		if($row > 0){
			while ($row = mysqli_fetch_assoc($result)) {
			    echo '<tr>';
		        echo '<td>' . $row['ProjectName'] . '</td>';
		        echo '<td>' . $row['MaintenanceContract'] . '</td>';
		        echo '<td>' . $row['Hardware'] . '</td>';
		        echo '<td>' . $row['Software'] . '</td>';
		        echo '<td>' . $row['Appointments'] . '</td>';
		        echo '<td><a class="btn btn-success" href="edit.php?cid='.$row['ProjectNR'].'">Edit</a></td>'; 
		        echo '<td><a class="btn btn-warning" href="../controllers/projectsController.php?aid='.$row['ProjectNR'].'">Activate</a></td>';  
		        echo '</tr>';    
			}  
		} else {
			echo "No results found.";
		}
	} else {
		echo "Please enter something in the search bar.";
	}							
	?>
	</tbody>
</table>

<!-- Back button -->
<div class='form-group'>
  	<a class='btn btn-default' href='index.php'>Back</a>
</div>

<?php require'../templates/footer.php';?>