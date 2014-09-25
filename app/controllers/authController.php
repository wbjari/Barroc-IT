<?php

require '../../config/config.php';

if(isset($_POST['authUser']))
{
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$sql = "SELECT username, password, userrole FROM login WHERE username = '$username'";
		if(!$query = mysqli_query($con, $sql))
		{
			trigger_error('Check sql voor fouten!');
		}
		if(mysqli_num_rows($query) == 1)
		{
			$row = mysqli_fetch_assoc($query);
		
			if($password == $row['password'])
			{
				session_start();
				$_SESSION['username'] = $row['username'];
				$_SESSION['role'] = $row['userrole'];
				header('location: ../index.php');
			}
			else
			{
				$msg = 'Gebruikersnaam of wachtwoord klopt niet.';
				header('location: ../login.php?msg=' . $msg);
			}
		}
		else
		{
				$msg = 'Gebruikersnaam of wachtwoord klopt niet.';
				header('location: ../login.php?msg=' . $msg);
		}
		
}


?>