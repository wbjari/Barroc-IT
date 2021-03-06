<?php 	require '../templates/header.php';
		require '../controllers/invoiceController.php';

if($_SESSION['role'] != 1)
{
	header('location: ../index.php');
}
if(isset($_GET['cid']))
{
  $back = $_GET['cid'];
}
if (isset($_POST['submit'])) 
{
  // error_reporting(E_ALL ^ E_NOTICE);
  $id = $_GET['cid'];
  $InvoiceDuration = mysqli_real_escape_string($con, $_POST['InvoiceDuration']);
  $Quantity = mysqli_real_escape_string($con, $_POST['Quantity']);
  $Description = mysqli_real_escape_string($con, $_POST['Description']);
  $Price = mysqli_real_escape_string($con, $_POST['Price']);
  $BTW = mysqli_real_escape_string($con, $_POST['BTW']);
  $Amount = mysqli_real_escape_string($con, $_POST['Amount']);
  $query = "INSERT INTO invoices (CustomerNR, InvoiceDuration, Quantity, Description, Price, BTW, Amount, Status)
                        VALUES    ('$id','$InvoiceDuration','$Quantity','$Description','$Price', '$BTW', '$Amount', 1)";
  $result = mysqli_query($con, $query);

    Header("location: ./index.php");  
      
}

if(isset($_GET['cid']))
{
	$id = $_GET['cid'];
	$edit = "SELECT * FROM invoices WHERE CustomerNR = '$id'";
	$r_edit = mysqli_query($con, $edit);
}
?>
<div class="panel-text">
    <h1>Finance panel: Add</h1>
</div>
<div class='form-group'>
  <div class='float_btn'>
	<a class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
  </div>
</div>

<form action="./add.php?cid=<?php echo $id; ?>" method="POST">
	<LEGEND>Add</LEGEND>
    <div class="form-group col-sm-6">
     <label for="InvoiceDuration" >Invoiceduration</label>
     <input type="date" class="form-control" name="InvoiceDuration" placeholder="2014-10-24" required>    
    </div>

    <div class="form-group col-sm-6">
     <label for="Quantity" >Quantity</label>
     <input type="text" class="form-control" name="Quantity" placeholder="5" required>   
    </div>
    <div class="form-group col-sm-6 col-xs-6">
     <label for="Description" >Description</label>
     <input type="text" class="form-control" name="Description" placeholder="Text" required>    
    </div>
    <div class="form-group col-sm-6">
     <label for="Price" >Price</label>
     <input type="text" class="form-control" name="Price" placeholder="150" required>    
    </div>
    <div class="form-group col-sm-6">
     <label for="BTW" >BTW</label>
     <input type="text" class="form-control" name="BTW" placeholder="21" required>   
    </div>
    <div class="form-group col-sm-12">
     <input name="submit" type="submit" value="Add" class="btn btn-primary">     
    </div>   
      </form>



<div class='form-group'>
    <div class="float_left">
  <a class='btn btn-default' href='activate.php?cid=<?php echo $back;  ?>'>Back</a>
    </div>
</div>
<?php require'../templates/footer.php';?>