<?php 	require '../../config/config.php';?>
<?php


$invoices = 'SELECT * FROM customers WHERE Prospect = "N" ';
$r_invoices = mysqli_query($con, $invoices);

if(isset($_GET['aid']))
{

	$id = $_GET['aid'];
	$test = $_GET['test'];
	$deactivate = "UPDATE invoices SET Status = 0 WHERE InvoiceNR = '$id' LIMIT 1";

	$r_deactivate = mysqli_query($con, $deactivate);
	header('location: ../finance/');
	$test;
}

if(isset($_GET['did']))
{

	$id = $_GET['did'];
	$deactivate = "UPDATE invoices SET Status = 1 WHERE InvoiceNR = '$id' LIMIT 1";

	$r_deactivate = mysqli_query($con, $deactivate);
	header('location: ../finance/index.php');
}
?>