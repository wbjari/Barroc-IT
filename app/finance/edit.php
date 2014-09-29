<?php 	require '../templates/header.php';
		require '../controllers/invoiceController.php';

if($_SESSION['role'] != 1)
{
	header('location: ../index.php');
}



if (isset($_POST['submit'])) 
{
	$id = $_GET['id'];
	$InvoiceDuration = mysqli_real_escape_string($con, $_POST['InvoiceDuration']);
	$Quantity = mysqli_real_escape_string($con, $_POST['Quantity']);
	$query = "UPDATE invoices SET InvoiceDuration = '$InvoiceDuration', Quantity = '$Quantity' WHERE InvoiceNR = '$id' LIMIT 1";
	$result = mysqli_query($con, $query);

  //MOET NOG GEFIXT WORDEN MAKKELIJKE MANIER 
    Header("location: ./index.php");  
      
}

if(isset($_GET['id']))
{
  $id = $_GET['id'];

$update = "SELECT * FROM Invoices WHERE InvoiceNR = '$id' ";
$r_update = mysqli_query($con,$update);}
?>
<div class="panel-text">
    <h1>Finance panel: Edit</h1>
</div>
<div class='form-group'>
  <div class='float_btn'>
	<a class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
  </div>
</div>

<?php
if ($row = mysqli_fetch_assoc($r_update)) 
{
?>

<form action="" method="POST">
	<LEGEND>Edit</LEGEND>
    <div class="form-group col-sm-6">
     <label for="InvoiceDuration">Invoiceduration</label>
     <input value="<?php echo $row['InvoiceDuration']; ?>" type="text" class="form-control" name="InvoiceDuration" >    
    </div>

    <div class="form-group col-sm-6">
     <label for="Quantity">Quantity</label>
     <input value="<?php echo $row['Quantity']; ?>" type="text" class="form-control" name="Quantity">   
    </div>
    <div class="form-group col-sm-12">
     <input name="submit" type="submit" value="Bewerk" class="btn btn-primary">     
    </div>   
      </form>
  <?php
	}
  ?>




<div class='form-group'>
  <a class='btn btn-default' href='index.php'>Back</a>
</div>
<?php require'../templates/footer.php';?>