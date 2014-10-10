<?php 	
require '../templates/header.php';
require '../controllers/projectsController.php';

if($_SESSION['role'] != (2 || 4)) 
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
			<td class="col-sm-2"><a href="index.php?sort=CompanyName">Company name</a></td>
			<td class="col-sm-2"><a href="index.php?sort=ContactPerson">Contact person</td>
			<td class="col-sm-2"><a href="index.php?sort=Address1">Address</td>
			<td class="col-sm-2"><a href="index.php?sort=Zipcode1">Zip code</td>
			<td class="col-sm-2"><a href="index.php?sort=Residence1">Residence</td>
			<td class="col-sm-2"><a href="index.php?sort=TelephoneNumber1">Telephone number</td>
			<td class="col-sm-2"><a href="index.php?sort=FaxNumber">Fax number</td>
			<td class="col-sm-2"><a href="index.php?sort=Email">E-mail</td>
			<td class="col-sm-2">Limit</td>
			<td class="col-sm-2">Activated projects</td>
			<td class="col-sm-2">Deactivated projects</td>
			<td class="col-sm-1">Open projects</td>
		</tr>
		</tr>
	</thead>
	<tbody>
	<?php
	while ($row = mysqli_fetch_assoc($r_customers)) 
    {
	    echo '<tr>';
	    echo '<td>' . $row['CompanyName'] . '</td>';
	    echo '<td>' . $row['ContactPerson'] . '</td>';
	    echo '<td>' . $row['Address1'] . '</td>';
	    echo '<td>' . $row['Zipcode1'] . '</td>';
	    echo '<td>' . $row['Residence1'] . '</td>';
	    echo '<td>' . $row['TelephoneNumber1'] . '</td>';
	    echo '<td>' . $row['FaxNumber'] . '</td>';
	    echo '<td>' . $row['Email'] . '</td>';

	    $credit2 = $row['Credit'];
		$limit2 = $row['Limit'];
				
		if($credit2 > $limit2) {
			echo '<td> <div class="limitCheck">' . $row['Limit'] . '</div></td>';
		} else {
			echo '<td>' . $row['Limit'] . '</td>';
		}

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
	?>
	</tbody>
</table>

<?php require'../templates/footer.php';?>