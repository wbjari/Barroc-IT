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
    // error_reporting(E_ALL ^ E_NOTICE);
    $id = $_GET['cid'];
    $ProjectName = mysqli_real_escape_string($con, $_POST['ProjectName']);
    $MaintenanceContract = mysqli_real_escape_string($con, $_POST['MaintenanceContract']);
    $Hardware = mysqli_real_escape_string($con, $_POST['Hardware']);
    $Software = mysqli_real_escape_string($con, $_POST['Software']);
    $Appointments = mysqli_real_escape_string($con, $_POST['Appointments']);
    $query = "INSERT INTO projects (CustomerNR, ProjectName, MaintenanceContract, Hardware, Software, Appointments)
              VALUES      ('$id','$ProjectName','$MaintenanceContract','$Hardware','$Software', '$Appointments')";

    $result = mysqli_query($con, $query);

    header("location: index.php?id=".$id);   
}

if(isset($_GET['cid']))
{
    $id = $_GET['cid'];
    $edit = "SELECT * FROM projects WHERE CustomerNR = '$id'";
    $r_edit = mysqli_query($con, $edit);
}
?>

<div class="panel-text">
<h1>Development panel: Add</h1>
</div>

<!-- Logout button -->
<div class='form-group'>
    <div class='float_btn'>
        <a class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
    </div>
</div>

<form action="add.php?cid=<?php echo $id; ?>" method="POST">
    <LEGEND>Add</LEGEND>
    <div class="form-group col-sm-6">
        <label for="ProjectName">ProjectName</label>
        <input type="text" class="form-control" name="ProjectName" placeholder="Website Application" required>    
    </div>

    <div class="form-group col-sm-6">
        <label for="MaintenanceContract">MaintenanceContract</label>
        <input type="text" class="form-control" name="MaintenanceContract" placeholder="Y/N" required>   
    </div>

    <div class="form-group col-sm-6">
        <label for="Hardware">Hardware</label>
        <input type="text" class="form-control" name="Hardware" placeholder="Desktop PC">    
    </div>

    <div class="form-group col-sm-6">
        <label for="Software">Software</label>
        <input type="text" class="form-control" name="Software" placeholder="Microsoft Word">    
    </div>

    <div class="form-group col-sm-6">
        <label for="Appointments">Appointments</label>
        <input type="text" class="form-control" name="Appointments" placeholder="Number of appointments">   
    </div>
    
    <div class="form-group col-sm-12">
        <input name="submit" type="submit" value="Add" class="btn btn-primary">     
    </div>   
</form>

<!-- Back button -->
<div class='form-group'>
    <a class='btn btn-default' href='<?php echo "index.php?id=$id" ?>'>Back</a>
</div>

<?php require'../templates/footer.php';?>