<?php require'templates/header.php';?>


<?php
if(!isset($_SESSION['name']))
{
	$msg = urlencode('U dient ingelogd te zijn');
	header('location: login.php' . $msg);
}
$userrole = $_SESSION['userrole'];
	switch($userrole)
	{
		case 1;
		header('location: finance');
		break;
		case 2:
		header('location: development');
		break;
		default:
		header('location: controllers/authController.php');

	}
?>


<?php require'templates/footer.php';?>