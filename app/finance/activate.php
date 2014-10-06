<?php 	require '../templates/header.php';
		require '../controllers/invoiceController.php';

if($_SESSION['role'] != 1)
{
	header('location: ../index.php');
}
if(isset($_GET['cid']))
{
	$id = $_GET['cid'];
	$view = "SELECT * FROM invoices WHERE  CustomerNR= '$id' AND Status = 1";
	$r_view = mysqli_query($con, $view);
}
?>

<div class="panel-text">
    <h1>Finance panel: Activated</h1>
</div>
<div class='form-group'>
  <div class='float_btn'>
	<a class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
  </div>
</div>
<div class='form-group'>
  <div class="float_left">
  <a class='btn btn-success' href='<?php echo "add.php?cid=$id" ?>'>Add</a>
  </div>
</div>
 <table class='table table-striped'>
    <thead>
      <tr>
        <td class="col-sm-2">Invoiceduration</td>
        <td class="col-sm-2">Quantity</td>
        <td class="col-sm-2">Description</td>
        <td class="col-sm-2">Price</td>
        <td class="col-sm-2">BTW</td>
        <td class="col-sm-2">+Amount</td>
        <td class="col-sm-2">Edit</td>
        <td class="col-sm-2">Deactivate</td>
      </tr>
      </tr>
    </thead>
    <tbody>
    <?php
      while ($row = mysqli_fetch_assoc($r_view)) 
        {
         echo '<tr>';
         echo '<td>' . $row['InvoiceDuration'] . '</td>';
         echo '<td>' . $row['Quantity'] . '</td>';
         echo '<td>' . $row['Description'] . '</td>';
         echo '<td>' . $row['Price'] . '</td>';
         echo '<td>' . $row['BTW'] . '</td>';
         echo '<td>' . $row['Amount'] . '</td>';
         echo '<td><a class="btn btn-success" href="edit.php?cid='.$row['InvoiceNR'].'">Edit</a></td>'; 
         echo '<td><a class="btn btn-warning" href="../controllers/invoiceController.php?aid='.$row['InvoiceNR'].'">Deactivate</a></td>'; 
         echo '</tr>';        
        }       
    ?>
</table>

<div class='form-group'>
  <a class='btn btn-default' href='index.php'>Back</a>
</div>
<?php require'../templates/footer.php';?>