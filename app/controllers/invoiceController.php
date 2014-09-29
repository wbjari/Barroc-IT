<?php 	require '../../config/config.php';?>
<?php

$invoices = 'SELECT * FROM customers';
$r_invoices = mysqli_query($con, $invoices);




?>