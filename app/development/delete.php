<?php
require '../templates/header.php'; 
require '../../config/config.php';

$id = 0;

if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if ( !empty($_POST)) {
	$id = $_POST['id'];
	mysqli_query($con, "DELETE * FROM projects WHERE id = ?");
}


mysqli_close($con);
?>
<div class="span10 offset1">
	<div class="row">
	    <h3>Delete a Customer</h3>
	</div>
	<form class="form-horizontal" action="delete.php" method="post">
	  	<input type="hidden" name="id" value="<?php echo $id;?>"/>
	 	<p class="alert alert-error">Are you sure to delete?</p>
	<div class="form-actions">
	    <button type="submit" class="btn btn-danger">Yes</button>
	    <a class="btn" href="index.php">No</a>
	</div>
	</form>
</div>