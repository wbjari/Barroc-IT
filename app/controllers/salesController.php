<?php 	require '../../config/config.php';?>
<?php


$sales = 'SELECT * FROM customers';
$r_sales = mysqli_query($con, $sales);

if(isset($_GET['aid']))
{

	$id = $_GET['aid'];
	$deactivate = "UPDATE appointments SET Status = 1 WHERE AppointmentNR = '$id' LIMIT 1";

	$r_deactivate = mysqli_query($con, $deactivate);
	header('location: ../sales/index.php');
}

if(isset($_GET['did']))
{

	$id = $_GET['did'];

	$deactivate = "UPDATE appointments SET Status = 0 WHERE AppointmentNR = '$id' LIMIT 1";

	$r_deactivate = mysqli_query($con, $deactivate);
	header('location: ../sales/index.php');
}


?>