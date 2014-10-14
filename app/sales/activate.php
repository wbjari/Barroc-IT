<?php 	require '../templates/header.php';
		require '../controllers/invoiceController.php';

if($_SESSION['role'] != 3)
{
	header('location: ../index.php');
}

if(isset($_GET['cid']))
{
  $_SESSION['checkid'] = $_GET['cid'];
	$id = $_GET['cid'];
	$view = "SELECT * FROM appointments WHERE  CustomerNR= '$id' AND Status = 1";
	$r_view = mysqli_query($con, $view);
}
?>

<div class="panel-text">
    <h1>Sales panel: Activate appointments</h1>
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
  <div class="float_left">
  <a class='btn btn-success' href='<?php echo "add.php?cid=$id" ?>'>Add</a>
  </div>
</div>
 <table class='table table-striped'>
    <thead>
      <tr>
        <td class="col-sm-2">CustomerNR</td>
        <td class="col-sm-2">Date</td>
        <td class="col-sm-2">Name</td>
        <td class="col-sm-2">Time</td>
        <td class="col-sm-2">Place</td>
        <td class="col-sm-2">Comments</td>
      </tr>
      </tr>
    </thead>
    <tbody>
    <?php
    while ($row = mysqli_fetch_assoc($r_view)) 
    {
        $id = $row['InvoiceNR'];
        
        echo '<tr>';
        echo '<td>' . $row['CustomerNR'] . '</td>';
        echo '<td>' . $row['Date'] . '</td>';
        echo '<td>' . $row['Name'] . '</td>';
        echo '<td>' . $row['Time'] . '</td>';
        echo '<td>' . $row['Place'] . '</td>';
        //Bereking amount
        $amount = "SELECT SUM((Quantity * Price) / 100 * (BTW + 100)) AS Amount FROM invoices WHERE InvoiceNR = '$id'";
        $r_amount = mysqli_query($con, $amount); 

            while($rows3 = mysqli_fetch_assoc($r_amount))
            {
                $amount1 = implode("", $rows3);
                echo '<td>' . $amount1 . '</td>';
                $insert = "UPDATE invoices SET Amount = '$amount1' WHERE InvoiceNR = '$id' LIMIT 1";
                $result = mysqli_query($con, $insert);
            }  
         echo '<td><a class="btn btn-success" href="edit.php?cid='.$row['InvoiceNR'].'&id=' . $row['CustomerNR'] . '">Edit</a></td>'; 
         echo '<td><a class="btn btn-warning" href="../controllers/invoiceController.php?aid='.$row['InvoiceNR'].'">Paid</a></td>'; 
         echo '</tr>';   
      }
    ?>
</table>

<div class='form-group'>
  <a class='btn btn-default' href='index.php'>Back</a>
</div>
<?php require'../templates/footer.php';?>