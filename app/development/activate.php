<?php   require '../templates/header.php';
    require '../controllers/projectsController.php';

if($_SESSION['role'] != 2 & 4)
{
  header('location: ../index.php');
}
if(isset($_GET['cid']))
{
  $id = $_GET['cid'];
  $view = "SELECT * FROM projects WHERE CustomerNR= '$id'AND Status = 1";
  $r_view = mysqli_query($con, $view);
}
?>

<div class="panel-text">
    <h1>Development panel: Activated</h1>
</div>
<div class='form-group'>
  <div class='float_btn'>
  <a class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
  </div>
</div>
<form action="search_activate.php" method="get" name="search_activate">
  <input id="search-bar" type="text" name="search_activate" >
  <input id="search-button" type="submit" value="Search" class="btn btn-primary">
</form>
<div class='form-group'>
  <div class="float_left">
  <a class='btn btn-success' href='<?php echo "add.php?cid=$id" ?>'>Add</a>
  </div>
</div>
<table class='table table-striped'>
    <thead>
      <tr>
        <td class="col-sm-2">Project Name</td>
        <td class="col-sm-2">Maintenance Contract</td>
        <td class="col-sm-2">Hardware</td>
        <td class="col-sm-2">Software</td>
        <td class="col-sm-2">Appointments</td>
        <td class="col-sm-2">Edit</td>
        <td class="col-sm-2">Deactivate</td>
      </tr>
      </tr>
    </thead>
    <tbody>
    <?php
      while ($row = mysqli_fetch_assoc($r_view)) 
        {
         echo '<tr>';
         echo '<td>' . $row['ProjectName'] . '</td>';
         echo '<td>' . $row['MaintenanceContract'] . '</td>';
         echo '<td>' . $row['Hardware'] . '</td>';
         echo '<td>' . $row['Software'] . '</td>';
         echo '<td>' . $row['Appointments'] . '</td>';
         echo '<td><a class="btn btn-success" href="edit.php?cid='.$row['ProjectNR'].'">Edit</a></td>'; 
         echo '<td><a class="btn btn-warning" href="../controllers/projectsController.php?aid='.$row['ProjectNR'].'">Deactivate</a></td>';  
         echo '</tr>';        
        }       
    ?>
</table>

<div class='form-group'>
  <a class='btn btn-default' href='index.php'>Back</a>
</div>
<?php require'../templates/footer.php';?>