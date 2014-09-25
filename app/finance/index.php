<?php 	require '../templates/header.php';
		require '../controllers/invoiceController.php';

if($_SESSION['role'] != 1)
{
	header('location: ../index.php');
}
?>

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
		  while ($row = mysqli_fetch_assoc($result)) 
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