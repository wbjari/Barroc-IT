<?php 	
require '../templates/header.php';
require '../controllers/projectsController.php';

// If the userrole isn't 2 OR 4: user goes back to index page
if($_SESSION['role'] != (2 || 4)) 
{
    header('location: ../index.php');
}

if (isset($_POST['submit'])) 
{
    $id = $_GET['cid'];
    $ProjectName = mysqli_real_escape_string($con, $_POST['ProjectName']);
    $MaintenanceContract = mysqli_real_escape_string($con, $_POST['MaintenanceContract']);
    $Hardware = mysqli_real_escape_string($con, $_POST['Hardware']);
    $Software = mysqli_real_escape_string($con, $_POST['Software']);
    $Appointments = mysqli_real_escape_string($con, $_POST['Appointments']);
    $StatusProject = mysqli_real_escape_string($con, $_POST['StatusProject']);
    $query = "UPDATE projects SET ProjectName = '$ProjectName', 
                     MaintenanceContract = '$MaintenanceContract', 
                     Hardware = '$Hardware',  
                     Software = '$Software', 
                     Appointments = '$Appointments',
                     StatusProject = '$StatusProject'
               WHERE ProjectNR = '$id' LIMIT 1";

    $result = mysqli_query($con, $query);

    //MOET NOG GEFIXT WORDEN MAKKELIJKE MANIER 
    header("location: index.php");  
}

if(isset($_GET['cid']))
{
    $id = $_GET['cid'];
    $update = "SELECT * FROM projects WHERE ProjectNR = '$id' ";
    $r_update = mysqli_query($con,$update);}
?>

<div class="panel-text">
<h1>Development panel: Edit</h1>
</div>

<!-- Logout button -->
<div class='form-group'>
    <div class='float_btn'>
        <a class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
    </div>
</div>

<?php
if ($row = mysqli_fetch_assoc($r_update)) 
{
?>

<form action="" method="POST">
    <LEGEND>Edit</LEGEND>
    <div class="form-group col-sm-6">
        <label for="ProjectName">Project Name</label>
        <input value="<?php echo $row['ProjectName']; ?>" type="text" class="form-control" name="ProjectName" placeholder="Website Application" required>    
    </div>

    <div class="form-group col-sm-6">
        <label for="MaintenanceContract">Maintenance Contract</label>
        <input value="<?php echo $row['MaintenanceContract']; ?>" type="text" class="form-control" name="MaintenanceContract" placeholder="Y/N" required>   
    </div>

    <div class="form-group col-sm-6">
        <label for="Hardware">Hardware</label>
        <input value="<?php echo $row['Hardware']; ?>" type="text" class="form-control" name="Hardware" placeholder="Desktop PC">    
    </div>

    <div class="form-group col-sm-6">
        <label for="Software">Software</label>
        <input value="<?php echo $row['Software']; ?>" type="text" class="form-control" name="Software" placeholder="Microsoft Word">   
    </div>

    <div class="form-group col-sm-6">
        <label for="Appointments">Appointments</label>
        <input value="<?php echo $row['Appointments']; ?>" type="text" class="form-control" name="Appointments" placeholder="Number of appointments">    
    </div>

    <div class="form-group col-sm-6">
        <label for="StatusProject">Status Project</label>
        <input value="<?php echo $row['StatusProject']; ?>" type="text" class="form-control" name="StatusProject">   
    </div>

    <div class="form-group col-sm-12">
        <input name="submit" type="submit" value="Bewerk" class="btn btn-primary">     
    </div>   
</form>
<?php
}
?>

<!-- Back button -->
<div class='form-group'>
    <a class='btn btn-default' href='index.php'>Back</a>
</div>

<?php require'../templates/footer.php';?>