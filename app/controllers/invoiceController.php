<?php 	require '../../config/config.php';?>
<?php

$invoices = 'SELECT * FROM invoices';
$r_invoices = mysqli_query($con, $invoices);




?>