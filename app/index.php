<?php require 'templates/header.php';?>


<?php
if(!isset($_SESSION['username']))
{
	$msg = urlencode('U dient ingelogd te zijn');
	header('location: login/index.php?msg=' . $msg);
}
$userrole = $_SESSION['role'];
	switch($userrole)
	{
		case 1;
		header('location: finance');
		break;
		case 2:
		header('location: development');
		break;
		case 3;
		header('location: sales');
		break;
		case 4:
		header('location: admin');
		break;
		default:
		header('location: controllers/authController.php');

	}
?>


<?php require'templates/footer.php';?>