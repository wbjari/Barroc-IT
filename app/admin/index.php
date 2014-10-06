<?php 	
require '../templates/header.php';

if($_SESSION['role'] != 4)
{
	header('location: ../index.php');
}
?>
<div class="panel-text">
    <h1>Admin panel</h1>
</div>
<div class='form-group'>
  	<div class='float_btn'>
  	<a class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
  	</div>
</div>
<td><a class="btn btn-success" href="../finance">Finance</a></td>
<td><a class="btn btn-success" href="../development">Development</a></td>
<td><a class="btn btn-success" href="../sales">Sales</a></td>