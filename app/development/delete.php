<?php
require '../templates/header.php'; 
require '../../config/config.php';

mysqli_query($con, "DELETE * FROM projects WHERE id = ?");

mysqli_close($con);
?>

