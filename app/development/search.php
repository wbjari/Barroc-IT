<?php 	
require '../templates/header.php';
require '../controllers/projectsController.php';

// If the userrole isn't 2 OR 4: user goes back to index page
if($_SESSION['role'] != (2 || 4)) 
{
	header('location: ../index.php');
}

$search = mysqli_real_escape_string($con, $_GET['search']);
$query = "SELECT * FROM customers WHERE BKR = 'Y' AND "; 
?>

<div class="panel-text">
    <h1>Development panel</h1>
</div>

<!-- Logout button -->
<div class='float_btn'>
	<a class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
</div>

<!-- Search button -->
<form action="search.php" method="get" name="search">
	<input id="search-bar" type="text" name="search">
	<input id="search-button" type="submit" value="Search" class="btn btn-primary">
</form>

<table class='table table-striped'>
	<thead>
		<tr>
		<td class="col-sm-2">Company name</td>
		<td class="col-sm-2">Contact persons</td>
		<td class="col-sm-2">Activated projects</td>
		<td class="col-sm-2">Deactivated projects</td>
		<td class="col-sm-1">Open projects</td>
		</tr>
		</tr>
	</thead>
	<tbody>
	<?php
	$search = trim($search);					
	if ($search){
		$query .= " CustomerNR = '". $search ."'
		OR CompanyName LIKE '%". $search ."%'
		OR ContactPerson LIKE '%". $search ."%'";
		$result = mysqli_query($con, $query);
		$row = mysqli_num_rows($result);
		
		if($row > 0){
			while ($row = mysqli_fetch_assoc($result)) {
			    echo '<tr>';
			    echo '<td>' . $row['CompanyName'] . '</td>';
			    echo '<td>' . $row['ContactPerson'] . '</td>';
			    echo '<td> <a class="btn btn-primary"href="activate.php?cid=' . $row['CustomerNR'] . '"</a>View</td>';
			    echo '<td> <a class="btn btn-primary"href="deactivate.php?cid=' . $row['CustomerNR'] . '"</a>View</td>'; 

			    $count = "SELECT COUNT(ProjectNR) FROM projects WHERE CustomerNR = '$i'";
				$r_count = mysqli_query($con, $count); 
				$i++;	

		    	while($rows = mysqli_fetch_assoc($r_count))
				{
					$separater = implode(",", $rows);
					echo '<td>' . $separater . '</td>';
					echo '</tr>';
				}  
			}  
		} else {
			echo "No results found.";
		}
	}							
	?>
	</tbody>
</table>

<!-- Back button -->
<div class='form-group'>
  	<a class='btn btn-default' href='index.php'>Back</a>
</div>

<?php require'../templates/footer.php';?>