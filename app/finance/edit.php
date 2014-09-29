<?php 	require '../templates/header.php';
		require '../controllers/invoiceController.php';

if($_SESSION['role'] != 1)
{
	header('location: ../index.php');
}



if (isset($_POST['submit'])) 
{
	$id = $_GET['id'];
	$CompanyName = mysqli_real_escape_string($con, $_POST['CompanyName']);
	$Adress = mysqli_real_escape_string($con, $_POST['Adress']);
	$query = "UPDATE customers SET CompanyName = '$CompanyName', Adress1 = '$Adress' WHERE CustomerNR = '$id' LIMIT 1";
	$result = mysqli_query($con, $query);
    Header("location: ./view.php?id=".$id);  
      
}

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$edit = "SELECT * FROM customers WHERE CustomerNR = '$id'";
	$r_edit = mysqli_query($con, $edit);
}
?>
<div class="panel-text">
    <h1>Finance panel: Edit</h1>
</div>
<div class='form-group'>
  <div class='float_btn'>
	<a class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
  </div>
</div>

<?php
if ($row = mysqli_fetch_assoc($r_update)) 
{
?>

<form action="./edit.php?id=<?php echo $id; ?>" method="POST">
	<LEGEND>Edit</LEGEND>
    <div class="form-group col-sm-6">
     <label for="CompanyName">Company Name</label>
     <input value="<?php echo $row['CompanyName']; ?>" type="text" class="form-control" name="CompanyName" >    
    </div>

    <div class="form-group col-sm-6">
     <label for="Adress">Adress</label>
     <input value="<?php echo $row['Adress1']; ?>" type="text" class="form-control" name="Adress">   
    </div>
    <div class="form-group col-sm-12">
     <input name="submit" type="submit" value="Bewerk" class="btn btn-primary">     
    </div>   
      </form>
  <?php
	}
  ?>




<div class='form-group'>
  <a class='btn btn-default' href='<?php echo "view.php?id=$id" ?>'>Back</a>
</div>
<?php require'../templates/footer.php';?>