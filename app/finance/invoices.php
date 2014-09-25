<?php 	require '../templates/header.php';
		require '../controllers/invoiceController.php';
?>

<div class="panel-text">
    <h1>Finance panel: Invoices</h1>
</div>

<ul class="list-unstyled">
<li><a href="index.php">Main</a></li>
<li><a href="customers.php">Customers</a></li>
</ul>
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
         echo '<td> <a href="index.php?id=' . $row['id'] . '"</a> Change </td>';
         echo '</tr>';        
        }       
		?>
		</tbody>
</table>

<?php require'../templates/footer.php';?>