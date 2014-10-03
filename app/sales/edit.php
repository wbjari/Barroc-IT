<?php 	require '../templates/header.php';
		require '../controllers/salesController.php';

if($_SESSION['role'] != 3)
{
	header('location: ../index.php');
}



if (isset($_POST['submit'])) 
{
 $companyName        = mysqli_real_escape_string($con, $_POST['CompanyName']);
  $adress1            = mysqli_real_escape_string($con, $_POST['Adress1']);
  $zipcode1           = mysqli_real_escape_string($con, $_POST['Zipcode1']);
  $residence1         = mysqli_real_escape_string($con, $_POST['Residence1']);
  $adress2            = mysqli_real_escape_string($con, $_POST['Adress2']);
  $zipcode2           = mysqli_real_escape_string($con, $_POST['Zipcode2']);
  $residence2         = mysqli_real_escape_string($con, $_POST['Residence2']);
  $contactPerson      = mysqli_real_escape_string($con, $_POST['ContactPerson']);
  $initials           = mysqli_real_escape_string($con, $_POST['Initials']);
  $telephoneNumber1   = mysqli_real_escape_string($con, $_POST['TelephoneNumber1']);
  $telephoneNumber2   = mysqli_real_escape_string($con, $_POST['TelephoneNumber2']);
  $faxNumber          = mysqli_real_escape_string($con, $_POST['FaxNumber']);
  $email              = mysqli_real_escape_string($con, $_POST['Email']);
  $offerNumbers       = mysqli_real_escape_string($con, $_POST['OfferNumbers']);
  $offerStatus        = mysqli_real_escape_string($con, $_POST['OfferStatus']);
  $prospect           = mysqli_real_escape_string($con, $_POST['Prospect']);
  $dateOfAction       = mysqli_real_escape_string($con, $_POST['DateOfAction']);
  $lastContactDate    = mysqli_real_escape_string($con, $_POST['LastContactDate']);
  $nextAction         = mysqli_real_escape_string($con, $_POST['NextAction']);
  $salePercentage     = mysqli_real_escape_string($con, $_POST['SalePercentage']);
  $creditWorthy       = mysqli_real_escape_string($con, $_POST['CreditWorthy']);
  $query = "UPDATE customers SET 	CompanyName = '$companyName',
									Adress1 = '$adress1',
									Zipcode1 = '$zipcode1',
									Residence1 = '$residence1',
									Adress2	= '$adress1',
									Zipcode2 = '$zipcode1',
									Residence2 = '$residence1',
									ContactPerson = '$contactPerson',
									Initials = '$initials',
									TelephoneNumber1 = '$telephoneNumber1',
									TelephoneNumber2 = '$telephoneNumber2',
									FaxNumber = '$faxNumber',
									Email = '$email',
									OfferNumbers = '$offerNumbers',
									OfferStatus = '$offerStatus',
									Prospect = '$prospect',
									DateOfAction = '$dateOfAction',
									LastContactDate = '$lastContactDate',
									NextAction = '$nextAction',
									SalePercentage = '$salePercentage',
									CreditWorthy = '$creditWorthy'
									WHERE CustomerNR = '$id' LIMIT 1";
  $result = mysqli_query($con, $query);

  //MOET NOG GEFIXT WORDEN MAKKELIJKE MANIER 
    header("location: ./index.php");  
      
}

if(isset($_GET['cid']))
{
  $id = $_GET['cid'];
  $update = "SELECT * FROM customers WHERE CustomerNR = '$id' ";
  $r_update = mysqli_query($con,$update);}
?>
<div class="panel-text">
    <h1>Sales panel: Edit</h1>
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

<form action="" method="POST">
	<LEGEND>Edit</LEGEND>
    <div class="form-group col-sm-6">
     <label for="InvoiceDuration">Invoiceduration</label>
     <input value="<?php echo $row['InvoiceDuration']; ?>" type="text" class="form-control" name="InvoiceDuration" >    
    </div>

    <div class="form-group col-sm-6">
     <label for="Quantity">Quantity</label>
     <input value="<?php echo $row['Quantity']; ?>" type="text" class="form-control" name="Quantity">   
    </div>

    <div class="form-group col-sm-6">
     <label for="Description">Description</label>
     <input value="<?php echo $row['Description']; ?>" type="text" class="form-control" name="Description" >    
    </div>

    <div class="form-group col-sm-6">
     <label for="Price">Price</label>
     <input value="<?php echo $row['Price']; ?>" type="text" class="form-control" name="Price">   
    </div>

    <div class="form-group col-sm-6">
     <label for="BTW">BTW</label>
     <input value="<?php echo $row['BTW']; ?>" type="text" class="form-control" name="BTW" >    
    </div>

    <div class="form-group col-sm-6">
     <label for="Amount">Amount</label>
     <input value="<?php echo $row['Amount']; ?>" type="text" class="form-control" name="Amount">   
    </div>

    <div class="form-group col-sm-12">
     <input name="submit" type="submit" value="Edit" class="btn btn-primary">     
    </div>   
      </form>
  <?php
	}
  ?>

<div class='form-group'>
  <a class='btn btn-default' href='index.php'>Back</a>
</div>
<?php require'../templates/footer.php';?>