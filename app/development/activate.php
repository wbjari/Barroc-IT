<?php   
require '../templates/header.php';
require '../controllers/projectsController.php';

// If the userrole isn't 2 OR 4: user goes back to index page
if($_SESSION['role'] != (2 || 4)) 
{
    header('location: ../index.php');
}

// Gets the id and status of the projects. If status = 1, the project is an activated project
if(isset($_GET['cid']))
{
    $_SESSION['checkid'] = $_GET['cid'];
    $id = $_GET['cid'];
    $projects .= " WHERE CustomerNR = '$id' AND Status = 1";
    $r_projects = mysqli_query($con, $projects);
}

// Sorts the table when clicked on one of the column headers
if (isset($_GET['sortActive']))
{
    $getSortActive = $_GET['sortActive'];

    switch ($getSortActive) {
        case 'ProjectName':
            $projects .= " ORDER BY ProjectName ASC";
            $r_projects = mysqli_query($con, $projects);
            break;
        case 'MaintenanceContract':
            $projects .= " ORDER BY MaintenanceContract ASC";
            $r_projects = mysqli_query($con, $projects);
            break;
        case 'Hardware':
            $projects .= " ORDER BY Hardware ASC";
            $r_projects = mysqli_query($con, $projects);
            break;
        case 'Software':
            $projects .= " ORDER BY Software ASC";
            $r_projects = mysqli_query($con, $projects);
            break;
        case 'Appointments':
            $projects .= " ORDER BY Appointments ASC";
            $r_projects = mysqli_query($con, $projects);
            break;
        case 'StatusProject':
            $projects .= " ORDER BY StatusProject ASC";
            $r_projects = mysqli_query($con, $projects);
            break;
        default:
            echo "Cannot sort this column.";
        break;
    }
}
?>

<div class="panel-text">
<h1>Development panel: Activated</h1>
</div>

<!-- Logout button -->
<div class='form-group'>
    <div class='float_btn'>
        <a class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
    </div>
</div>

<!-- Search button -->
<form action="search_activate.php" method="get" name="search_activate">
    <input id="search-bar" type="text" name="search_activate" >
    <input id="search-button" type="submit" value="Search" class="btn btn-primary">
</form>

<!-- Add button -->
<div class='form-group'>
    <div class="float_left">
        <a class='btn btn-success' href='<?php echo "add.php?cid=$id" ?>'>Add</a>
    </div>
</div>

<!-- TABLE OF ACTIVATED PROJECTS -->
<table class='table table-striped'>
    <thead>
        <tr>
        <?php
        echo '<td class="col-sm-2"><a href="activate.php?sortActive=ProjectName&cid='. $id .'">Project Name</td>';
        echo '<td class="col-sm-2"><a href="activate.php?sortActive=MaintenanceContract&cid='. $id .'">Maintenance Contract</td>';
        echo '<td class="col-sm-2"><a href="activate.php?sortActive=Hardware&cid='. $id .'">Hardware</td>';
        echo '<td class="col-sm-2"><a href="activate.php?sortActive=Software&cid='. $id .'">Software</td>'; 
        echo '<td class="col-sm-2"><a href="activate.php?sortActive=Appointments&cid='. $id .'">Appointments</td>';
        echo '<td class="col-sm-2"><a href="activate.php?sortActive=StatusProject&cid='. $id .'">Status Project</td>';
        ?>
        <td class="col-sm-2">Edit</td>
        <td class="col-sm-2">Deactivate</td>
        </tr>
    </thead>

    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($r_projects)) 
        {
            echo '<tr>';
            echo '<td>' . $row['ProjectName'] . '</td>';
            echo '<td>' . $row['MaintenanceContract'] . '</td>';
            echo '<td>' . $row['Hardware'] . '</td>';
            echo '<td>' . $row['Software'] . '</td>';
            echo '<td>' . $row['Appointments'] . '</td>';
            echo '<td>' . $row['StatusProject'] . '</td>';
            echo '<td><a class="btn btn-success" href="edit.php?cid='.$row['ProjectNR'].'">Edit</a></td>'; 
            echo '<td><a class="btn btn-warning" href="../controllers/projectsController.php?aid='.$row['ProjectNR'].'">Deactivate</a></td>';  
            echo '</tr>';        
        }       
        ?>
    </tbody>
</table>

<!-- Back button -->
<div class='form-group'>
<a class='btn btn-default' href='index.php'>Back</a>
</div>

<?php require'../templates/footer.php';?>