<?php 	require '../templates/header.php';
		require '../controllers/invoiceController.php';

if($_SESSION['role'] != 1)
{
	header('location: ../index.php');
}
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$edit = "SELECT * FROM invoices WHERE id = '$id'";
	$r_edit = mysqli_query($con, $edit);
}
?>

<div class="panel-text">
    <h1>Finance panel: Edit</h1>
</div>
<div class='form-group'>
  <div class='float_btn'>
	<a class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
  </div>
</div>




<div class='form-group'>
  <a class='btn btn-default' href='<?php echo "view.php?id=$id" ?>'>Back</a>
</div>
<?php require'../templates/footer.php';?>