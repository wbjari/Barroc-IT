<?php 	
require '../templates/header.php';

if($_SESSION['role'] != 4)
{
	header('location: ../index.php');
}
?>
<p>Test</p>