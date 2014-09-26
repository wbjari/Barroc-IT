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
	<a class='btn btn-large' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
  </div>
<!-- <ul class="list-unstyled">
<li><a href="invoices.php">Invoices</a></li>
<li><a href="customers.php">Customers</a></li>
</ul> -->
<table class='table table-striped'>
		<thead>
			<tr>
				<td class="col-sm-2">Customername</td>
				<td class="col-sm-2">Customerproject</td>
			</tr>
			</tr>
		</thead>
		<tbody>
		<?php
		  while ($row = mysqli_fetch_assoc($r_invoices)) 
        {
         echo '<tr>';
         echo '<td>' . $row['Customername'] . '</td>';
         echo '<td>' . $row['Customerproject'] . '</td>';
         echo '<td> <a href="view.php?id=' . $row['id'] . '"</a> View </td>';
         echo '</tr>';        
        }       
		?>
		</tbody>
</table>


<?php require'../templates/footer.php';?>