<?php

if($_SESSION['role'] != 3)
{
	header('location: ../index.php');
}

?>