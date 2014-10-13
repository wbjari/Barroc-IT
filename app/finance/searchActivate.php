<?php 	require '../templates/header.php';
		    require '../controllers/invoiceController.php';


if($_SESSION['role'] != 1)
{
	header('location: ../index.php');
}

  $id = $_SESSION['checkid'];
  $search = mysqli_real_escape_string($con, $_GET['search']);
  $query= "SELECT * FROM Invoices WHERE Status = 1 AND CustomerNR = $id AND";

?>

<div class="panel-text">
    <h1>Finance panel: Not paid</h1>
</div>
<form action="searchActivate.php" method="get" name="search">
  <input id="search-bar" type="text" name="search">
  <input id="search-button" type="submit" value="Search" class="btn btn-primary">
</form>
<div class='form-group'>
  <div class='float_btn'>
	<a class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
  </div>
</div>
<div class='form-group'>
  
  <a class='btn btn-success' href='<?php echo "add.php?cid=$id" ?>'>Add</a>
  
</div>
 <table class='table table-striped'>
    <thead>
      <tr>
        <td class="col-sm-2">Invoiceduration</td>
        <td class="col-sm-2">Quantity</td>
        <td class="col-sm-2">Description</td>
        <td class="col-sm-2">Price</td>
        <td class="col-sm-2">BTW</td>
        <td class="col-sm-2">Amount</td>
      </tr>
      </tr>
    </thead>
    <tbody>
    <?php
$search = trim($search);          
  if ($search){
      $query .= " (Quantity LIKE '%". $search ."%' 
      OR Description LIKE '%". $search ."%' 
      OR Price LIKE '%". $search ."%')";
      $result = mysqli_query($con,$query);
      $row = mysqli_num_rows($result);
      if($row > 0){
    while ($row = mysqli_fetch_assoc($result)) 
    {
        $implode = implode(" ", $row);
        echo '<tr>';
        echo '<td>' . $row['InvoiceDuration'] . '</td>';
        echo '<td>' . $row['Quantity'] . '</td>';
        echo '<td>' . $row['Description'] . '</td>';
        echo '<td>' . $row['Price'] . '</td>';
        echo '<td>' . $row['BTW'] . '</td>';
        echo '<td>' . $row['Amount'] . '</td>';
        echo '<td><a class="btn btn-success" href="edit.php?cid='.$row['InvoiceNR'].'&id=' . $row['CustomerNR'] . '">Edit</a></td>'; 
        echo '<td><a class="btn btn-warning" href="../controllers/invoiceController.php?aid='.$row['InvoiceNR'].'">Paid</a></td>'; 
        echo '</tr>';   
      }
    }
        else
         {
          echo "No results have been found. Please try again.";
         }

} 
else
  {
  echo "Please enter a word into the search function.";
  }
    ?>
</table>

<div class='form-group'>
  <a class='btn btn-default' href='index.php'>Back</a>
</div>
<?php require'../templates/footer.php';?>