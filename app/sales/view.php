<?php   require '../templates/header.php';
    require '../controllers/invoiceController.php';

if($_SESSION['role'] != 3)
{
  header('location: ../index.php');
}
if(isset($_GET['id']))
{
  $id = $_GET['id'];
  $view = "SELECT * FROM sales WHERE id = '$id'";
  $r_view = mysqli_query($con, $view);
}
?>

<div class="panel-text">
    <h1>Sales panel: View</h1>
</div>
<div class='form-group'>
  <div class='float_btn'>
  <a class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
  </div>
</div>
<div class='form-group'>
  <a class='btn btn-success' href='<?php echo "edit.php?id=$id" ?>'>Edit</a>
</div>
<!-- <ul class="list-unstyled">
<li><a href="invoices.php">Invoices</a></li>
<li><a href="customers.php">Customers</a></li>
</ul> -->

 <table class='table table-striped'>
    <thead>
      <tr>
        <td class="col-sm-2">Company name</td>
        <td class="col-sm-2">Contact person</td>
      </tr>
      </tr>
    </thead>
    <tbody>
    <?php
      while ($row = mysqli_fetch_assoc($r_view)) 
        {
         echo '<tr>';
         echo '<td>' . $row['companyname'] . '</td>';
         echo '<td>' . $row['contactperson'] . '</td>';
         echo '</tr>';        
        }       
    ?>
</table>

<div class='form-group'>
  <a class='btn btn-default' href='index.php'>Back</a>
</div>
<?php require'../templates/footer.php';?>