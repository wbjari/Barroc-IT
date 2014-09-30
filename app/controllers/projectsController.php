<?php 	require '../../config/config.php';?>
<?php

$projects = 'SELECT * FROM projects';
$r_projects = mysqli_query($con, $projects);


?>