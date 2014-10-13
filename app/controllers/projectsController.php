<?php 
require '../../config/config.php';

$projects = 'SELECT * FROM projects';
$r_projects = mysqli_query($con, $projects);

$customers = 'SELECT * FROM customers WHERE BKR = "Y" AND Prospect = "N"';
$r_customers = mysqli_query($con, $customers);

$i = 1;

if(isset($_GET['aid'])){

	$id = $_GET['aid'];
	$deactivate = "UPDATE projects SET Status = 0 WHERE ProjectNR = '$id' LIMIT 1";

	$r_deactivate = mysqli_query($con, $deactivate);
	header('location: ../development/index.php');
}
if(isset($_GET['did'])){

	$id = $_GET['did'];
	$deactivate = "UPDATE projects SET Status = 1 WHERE ProjectNR = '$id' LIMIT 1";

	$r_deactivate = mysqli_query($con, $deactivate);
	header('location: ../development/index.php');
}

if (isset($_GET['sort']))
{
	$getSort = $_GET['sort'];

	switch ($getSort) {
		case 'CompanyName':
			$customers .= " ORDER BY CompanyName ASC";
			$r_customers = mysqli_query($con, $customers);
			break;

		case 'ContactPerson':
			$customers .= " ORDER BY ContactPerson ASC";
	    	$r_customers = mysqli_query($con, $customers);
	    	break;
	    case 'Adress1':
	    	$customers .= " ORDER BY Adress1 ASC";
	    	$r_customers = mysqli_query($con, $customers);
	    	break;
	    case 'Zipcode1':
	    	$customers .= " ORDER BY Zipcode1 ASC";
	    	$r_customers = mysqli_query($con, $customers);
	    	break;
	    case 'Residence1':
	    	$customers .= " ORDER BY Residence1 ASC";
	    	$r_customers = mysqli_query($con, $customers);
	    	break;
	    case 'TelephoneNumber1':
	    	$customers .= " ORDER BY TelephoneNumber1 ASC";
	    	$r_customers = mysqli_query($con, $customers);
	    	break;
	    case 'FaxNumber':
	    	$customers .= " ORDER BY FaxNumber ASC";
	    	$r_customers = mysqli_query($con, $customers);
	    	break;
	    case 'Email':
	    	$customers .= " ORDER BY Email ASC";
	    	$r_customers = mysqli_query($con, $customers);
	    	break;
		default:
			echo "Cannot sort this column.";
			break;
	}
}

?>