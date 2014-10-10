<?php   require '../templates/header.php';
        require '../controllers/salesController.php';

if($_SESSION['role'] != 3)
{
  header('location: ../index.php');
}

if (isset($_POST['submit'])) 
{
  // error_reporting(E_ALL ^ E_NOTICE);
  $id          = $_GET['cid'];
  var_dump($id);

  $date        = mysqli_real_escape_string($con, $_POST['Date']);
  $name        = mysqli_real_escape_string($con, $_POST['Name']);
  $time        = mysqli_real_escape_string($con, $_POST['Time']);
  $place        = mysqli_real_escape_string($con, $_POST['Place']);
  $comments        = mysqli_real_escape_string($con, $_POST['Comments']);
  $query = "INSERT INTO appointments (CustomerNR, Date, Name, Time, Place, Comments)
                        VALUES    ('$id', '$date','$name', '$time', '$place', '$comments')";
   $result = mysqli_query($con, $query);
   $lastId = mysqli_insert_id($con);

    // header("location: ./view.php?id=".$lastId);
     // header("location: ./index.php");
      
}
?>
<div class="panel-text">
    <h1>Sales panel: Add appointment</h1>
</div>
<div class='form-group'>
  <div class='float_btn'>
  <a class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
  </div>
</div>

<form action="#" method="POST">
  <LEGEND>Add appointment</LEGEND>
   <div class="form-group col-sm-6">
     <label for="Date">Date</label>
     <input type="date" class="form-control" name="Date" required>
    </div>
     <div class="form-group col-sm-6">
     <label for="Name">Name</label>
     <input type="text" class="form-control" name="Name" required> 
    </div>
     <div class="form-group col-sm-6">
     <label for="Time">Time</label>
     <input type="time" class="form-control" name="Time" required>
    </div>
    <div class="form-group col-sm-6">
     <label for="Place">Place</label>
     <input type="text" class="form-control" name="Place" required> 
    </div>
    <div class="form-group col-sm-6">
     <label for="Comments">Comments</label>
     <textarea class="form-control" name="Comments" required></textarea> 
    </div>
    <div class="form-group col-sm-12">
     <input name="submit" type="submit" value="Add" class="btn btn-primary">     
    </div>   
      </form>



<div class='form-group'>
  <a class='btn btn-default' href='index.php'>Back</a>
</div>

<?php require'../templates/footer.php';?>