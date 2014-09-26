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
	<input type='submit'name='authController' id='Logout' class='btn btn-large' value='Logout'>
  </div>
</div>
<div class='form-group'>
  <a class='btn btn-success' href='<?php echo "edit.php?id=$id" ?>'>Edit</a>
</div>
<!-- <ul class="list-unstyled">
<li><a href="invoices.php">Invoices</a></li>
<li><a href="customers.php">Customers</a></li>
</ul> -->


<div class='form-group'>
  <a class='btn btn-success' href='index.php'>Back</a>
</div>
<?php require'../templates/footer.php';?>