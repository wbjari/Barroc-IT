<?php require'templates/header.php';?>


<?php
if(!isset($_SESSION['name']))
{
	$msg = urlencode('U dient ingelogd te zijn');
	header('location: login.php?msg=' . $msg);
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
		var_dump($userrole);
		/*header('location: controllers/authController.php');*/

	}
?>


<?php require'templates/footer.php';?>