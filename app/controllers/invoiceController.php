<?php 	require '../../config/config.php';?>
<?php

$invoices = 'SELECT * FROM customers';
$r_invoices = mysqli_query($con, $invoices);



if(isset($_GET['aid'])){

	$id = $_GET['aid'];
	$deactivate = "UPDATE invoices SET Status = 0 WHERE InvoiceNR = '$id' LIMIT 1";

	$r_deactivate = mysqli_query($con, $deactivate);
	header('location: ../finance/index.php');
}
if(isset($_GET['did'])){

	$id = $_GET['did'];
	$deactivate = "UPDATE invoices SET Status = 1 WHERE InvoiceNR = '$id' LIMIT 1";

	$r_deactivate = mysqli_query($con, $deactivate);
	header('location: ../finance/index.php');
}
?>