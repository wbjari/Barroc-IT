<?php 	require '../../config/config.php';?>
<?php

$projects = 'SELECT * FROM projects';
$r_projects = mysqli_query($con, $projects);

$customers = 'SELECT * FROM customers';
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
?>