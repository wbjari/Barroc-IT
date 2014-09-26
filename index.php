<?php  

if (isset($_SESSION['name'])) {
	header('location: app/index.php');
} else {
	header('location: app/login/index.php');
}

?>