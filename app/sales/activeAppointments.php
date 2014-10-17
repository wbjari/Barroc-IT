<script>
function myFunction() {
    location.reload();
}
</script>

<?php 	require '../templates/header.php';
		require '../controllers/invoiceController.php';

if($_SESSION['role'] != 3)
{
	header('location: ../index.php');
}

if(isset($_GET['id']))
{
  $_SESSION['checkid'] = $_GET['id'];
	$id = $_GET['id'];
	$view = "SELECT * FROM appointments WHERE  CustomerNR = '$id' AND Status = 1";
	$r_view = mysqli_query($con, $view);
}
?>

<div class="panel-text">
    <h1>Sales panel: Active appointments</h1>
</div>
<form action="searchActivate.php" method="get" name="search">
  <input id="search-bar" type="text" name="search">
  <input title="Search" id="search-button" type="submit" value="Search" class="btn btn-primary">
</form>
<div class='form-group'>
  <div class='float_btn'>
	<a title="Logout" class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
  </div>
</div>
  <table class='table table-striped'>
    <thead>
      <tr>
        <td></td>
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
        $id = $row['AppointmentNR'];
        
        echo '<tr>';
        echo '<td><a onclick="reloadPage()" title="Make inactive" class="btn btn-success" href="../controllers/salesController.php?did='.$row['CustomerNR'].'"><span class="glyphicon glyphicon-ban-circle"></span></a></td>';
        echo '<td>' . $row['Date'] . '</td>';
        echo '<td>' . $row['Name'] . '</td>';
        echo '<td>' . $row['Time'] . '</td>';
        echo '<td>' . $row['Place'] . '</td>';
        echo '<td>' . $row['Comments'] . '</td>';
        echo '</tr>';   
      }
    ?>
</table>

<div class='form-group'>
  <a title="Back" class='btn btn-default' href='index.php'><span class="glyphicon glyphicon-chevron-left"></span></a>
</div>
<?php require'../templates/footer.php';?>