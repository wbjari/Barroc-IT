<?php 	require '../templates/header.php';
		require '../controllers/invoiceController.php';

if($_SESSION['role'] != 1)
{
	header('location: ../index.php');
}
if(isset($_GET['id']))
{
  $back = $_GET['id'];
}
if (isset($_POST['submit'])) 
{
	$id = $_GET['cid'];
	$InvoiceDuration = mysqli_real_escape_string($con, $_POST['InvoiceDuration']);
	$Quantity = mysqli_real_escape_string($con, $_POST['Quantity']);
  $Description = mysqli_real_escape_string($con, $_POST['Description']);
  $Price = mysqli_real_escape_string($con, $_POST['Price']);
  $BTW = mysqli_real_escape_string($con, $_POST['BTW']);
  $Amount = mysqli_real_escape_string($con, $_POST['Amount']);
  $Accepted = mysqli_real_escape_string($con, $_POST['Accepted']);
	$query = "UPDATE invoices SET InvoiceDuration = '$InvoiceDuration', 
                                Quantity = '$Quantity', 
                                Description = '$Description',  
                                Price = '$Price', 
                                BTW = '$BTW',
                                Amount = '$Amount',
                                Accepted = '$Accepted'
                                WHERE InvoiceNR = '$id' LIMIT 1";
	$result = mysqli_query($con, $query);

  //MOET NOG GEFIXT WORDEN MAKKELIJKE MANIER 
    header("location: ./index.php");  
      
}
if(isset($_GET['id']))
{
  $back = $_GET['id'];
}
if(isset($_GET['cid']))
{
  $id = $_GET['cid'];
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
     <input value="<?php echo $row['InvoiceDuration']; ?>" type="text" class="form-control" name="InvoiceDuration" required>    
    </div>

    <div class="form-group col-sm-6">
     <label for="Quantity">Quantity</label>
     <input value="<?php echo $row['Quantity']; ?>" type="text" class="form-control" name="Quantity" required>   
    </div>

    <div class="form-group col-sm-6">
     <label for="Description">Description</label>
     <input value="<?php echo $row['Description']; ?>" type="text" class="form-control" name="Description" required>    
    </div>

    <div class="form-group col-sm-6">
     <label for="Price">Price</label>
     <input value="<?php echo $row['Price']; ?>" type="text" class="form-control" name="Price" required>   
    </div>

    <div class="form-group col-sm-6">
     <label for="BTW">BTW</label>
     <input value="<?php echo $row['BTW']; ?>" type="text" class="form-control" name="BTW" required>    
    </div>
        <div class="form-group col-sm-6">
     <label for="Accepted">Accepted</label>
     <input value="<?php echo $row['Accepted']; ?>" type="text" class="form-control" name="Accepted" required>    
    </div>

    <div class="form-group col-sm-12">
     <input name="submit" type="submit" value="Save" class="btn btn-primary">     
    </div>   
      </form>
  <?php
	}
  ?>

<div class='form-group'>
  <a class='btn btn-default' href='activate.php?cid=<?php echo $back;  ?>'>Back</a>
</div>
<?php require'../templates/footer.php';?>