<?php 	require '../templates/header.php';
		require '../controllers/invoiceController.php';

if($_SESSION['role'] != 1)
{
	header('location: ../index.php');
}
?>


<div class="panel-text">
    <h1>Finance panel</h1>
</div>
  <div class='float_btn'>
	<a class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
  </div>
  				<form action="search.php" method="get" name="search">
					<input id="search-bar" type="text" name="search" >
					<input id="search-button" type="submit" value="Search" class="btn btn-primary">
				</form>

<table class='table table-striped'>
		<thead>
			<tr>
				<td class="col-sm-2">Companyname</td>
				<td class="col-sm-2">Bank account number</td>
				<td class="col-sm-2">Credit</td>
				<td class="col-sm-2">Revenue amount</td>
				<td class="col-sm-2">Limit</td>
				<td class="col-sm-2">Ledger account</td>
				<td class="col-sm-2">BKR</td>
				<td class="col-sm-2">Activated invoices</td>
				<td class="col-sm-2">Deactivated invoices</td>
				<td class="col-sm-2">Edit</td>
				<td class="col-sm-2">Invoice number</td>
				

			</tr>
		</thead>
		<tbody>
		<?php
		  while ($row = mysqli_fetch_assoc($r_invoices)) 
        {
         echo '<tr>';
         echo '<td>' . $row['CompanyName'] . '</td>';
         echo '<td>' . $row['BankaccountNr'] . '</td>';
         echo '<td>' . $row['Credit'] . '</td>';
         echo '<td>' . $row['RevenueAmount'] . '</td>';
         echo '<td>' . $row['Limit'] . '</td>';
         echo '<td>' . $row['LedgerAccount'] . '</td>';
         echo '<td>' . $row['BKR'] . '</td>';
         echo '<td> <a class="btn btn-primary"href="activate.php?cid=' . $row['CustomerNR'] . '"</a> View </td>';
         echo '<td> <a class="btn btn-primary"href="deactivate.php?cid=' . $row['CustomerNR'] . '"</a> View </td>';
         echo '<td> <a class="btn btn-success"href="addinfo.php?cid=' . $row['CustomerNR'] . '"</a> Edit </td>';
         
		$count = "SELECT COUNT(InvoiceNR) FROM invoices WHERE CustomerNR = '$i'";
		$r_count = mysqli_query($con, $count); 
		$i++;

			while($rows = mysqli_fetch_assoc($r_count))
				{
					$separater = implode("", $rows);
					echo '<td>' . $separater . '</td>';
				}
         echo '</tr>';  
        }   
		?>


         
     
		</tbody>
</table>


<?php require'../templates/footer.php';?>