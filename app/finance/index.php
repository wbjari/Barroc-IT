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
<!-- <ul class="list-unstyled">
<li><a href="invoices.php">Invoices</a></li>
<li><a href="customers.php">Customers</a></li>
</ul> -->
<table class='table table-striped'>
		<thead>
			<tr>
				<td class="col-sm-2">Companyname</td>
				<td class="col-sm-2">Adress</td>
			</tr>
			</tr>
		</thead>
		<tbody>
		<?php
		  while ($row = mysqli_fetch_assoc($r_invoices)) 
        {
         echo '<tr>';
         echo '<td>' . $row['CompanyName'] . '</td>';
         echo '<td>' . $row['Adress1'] . '</td>';
         echo '<td> <a href="view.php?id=' . $row['CustomerNR'] . '"</a> View </td>';
         echo '</tr>';        
        }       
		?>
		</tbody>
</table>


<?php require'../templates/footer.php';?>