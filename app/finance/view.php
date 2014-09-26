<?php 	require '../templates/header.php';
		require '../controllers/invoiceController.php';

if($_SESSION['role'] != 1)
{
	header('location: ../index.php');
}
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$view = "SELECT * FROM invoices WHERE id = '$id'";
	$r_view = mysqli_query($con, $view);
}
?>

<div class="panel-text">
    <h1>Finance panel: View</h1>
</div>
<div class='form-group'>
	<input type='submit'name='authController' id='Logout' class='btn btn-large' value='Logout'>
</div>
<!-- <ul class="list-unstyled">
<li><a href="invoices.php">Invoices</a></li>
<li><a href="customers.php">Customers</a></li>
</ul> -->

 <table class='table table-striped'>
    <thead>
      <tr>
      <?php
      while ($row = mysqli_fetch_assoc($r_view)) 
        {
          echo '<tr>';
          ?>
        <td class="col-sm-2">Customername</td>
        <?php echo '<td>' . $row['Customername'] . '</td>';?>
        <td class="col-sm-2">Customerproject</td>
         <?php echo '<td>' . $row['Customerproject'] . '</td>';?>
         <td class="col-sm-2">Customername</td>
        <?php echo '<td>' . $row['Customername'] . '</td>';?>
        <td class="col-sm-2">Customerproject</td>
         <?php echo '<td>' . $row['Customerproject'] . '</td>';?>
         <td class="col-sm-2">Customername</td>
        <?php echo '<td>' . $row['Customername'] . '</td>';?>
        <td class="col-sm-2">Customerproject</td>
         <?php echo '<td>' . $row['Customerproject'] . '</td>';?>

      </tr>
      </tr>
    </thead>
    <tbody>
    <?php
         echo '</tr>';        
        }       
    ?>
</table>


<?php require'../templates/footer.php';?>