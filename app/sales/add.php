<?php 	require '../templates/header.php';
		    require '../controllers/salesController.php';

if($_SESSION['role'] != 3)
{
	header('location: ../index.php');
}

if (isset($_POST['submit'])) 
{
  // error_reporting(E_ALL ^ E_NOTICE);
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
  $query = "INSERT INTO customers (CompanyName, Adress1, ZipCode1, Residence1, Adress2, Zipcode2, Residence2, ContactPerson, Initials, 
                                  TelephoneNumber1, TelephoneNumber2, FaxNumber, Email, OfferNumbers, OfferStatus, Prospect, DateOfAction, 
                                  LastContactDate, NextAction, SalePercentage, CreditWorthy)
                        VALUES    ('$companyName','$adress1', '$zipcode1', '$residence1', '$adress2', '$zipcode2', '$residence2', '$contactPerson', 
                                  '$initials', '$telephoneNumber1', '$telephoneNumber2', '$faxNumber', '$email', '$offerNumbers', '$offerStatus', 
                                  '$prospect', '$dateOfAction', '$lastContactDate', '$nextAction', '$salePercentage', '$creditWorthy')";
  $result = mysqli_query($con, $query);

    header("location: ./view.php?id=".$id);  
      
}

if(isset($_GET['cid']))
{
  $id = $_GET['cid'];
  $edit = "SELECT * FROM customers WHERE CustomerNR = '$id'";
  $r_edit = mysqli_query($con, $edit);
}
?>
<div class="panel-text">
    <h1>Finance panel: Add</h1>
</div>
<div class='form-group'>
  <div class='float_btn'>
  <a class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
  </div>
</div>

<form action="./add.php" method="POST">
  <LEGEND>Add</LEGEND>
    <div class="form-group col-sm-6">
     <label for="CompanyName">Company name*</label>
     <input type="text" class="form-control" name="CompanyName" >    
    </div>

    <div class="form-group col-sm-6">
     <label for="Adress1">Address 1*</label>
     <input type="text" class="form-control" name="Adress1">   
    </div>
    <div class="form-group col-sm-6">
     <label for="Zipcode1">Zipcode 1*</label>
     <input type="text" class="form-control" name="Zipcode1" >    
    </div>
    <div class="form-group col-sm-6">
     <label for="Residence1">Residence 1*</label>
     <input type="text" class="form-control" name="Residence1">   
    </div>
    <div class="form-group col-sm-6">
     <label for="Adress2">Address 2</label>
     <input type="text" class="form-control" name="Adress2">   
    </div>
    <div class="form-group col-sm-6">
     <label for="Zipcode2">Zipcode 2</label>
     <input type="text" class="form-control" name="Zipcode2">   
    </div>
    <div class="form-group col-sm-6">
     <label for="Residence2">Residence 2</label>
     <input type="text" class="form-control" name="Residence2">   
    </div>
    <div class="form-group col-sm-6">
     <label for="ContactPerson">Contact person</label>
     <input type="text" class="form-control" name="ContactPerson">   
    </div>
    <div class="form-group col-sm-6">
     <label for="Initials">Initials</label>
     <input type="text" class="form-control" name="Initials">   
    </div>
    <div class="form-group col-sm-6">
     <label for="TelephoneNumber1">Telephone 1*</label>
     <input type="text" class="form-control" name="TelephoneNumber1">   
    </div>
    <div class="form-group col-sm-6">
     <label for="TelephoneNumber2">Telephone 2</label>
     <input type="text" class="form-control" name="TelephoneNumber2">   
    </div>
    <div class="form-group col-sm-6">
     <label for="FaxNumber">Fax</label>
     <input type="text" class="form-control" name="FaxNumber">   
    </div>
    <div class="form-group col-sm-6">
     <label for="Email">Email*</label>
     <input type="text" class="form-control" name="Email">   
    </div>
    <div class="form-group col-sm-6">
     <label for="OfferNumbers">Offer numbers</label>
     <input type="text" class="form-control" name="OfferNumbers">   
    </div>
    <div class="form-group col-sm-6">
     <label for="OfferStatus">Offer status</label>
     <input type="text" class="form-control" name="OfferStatus">   
    </div>

    <div class="form-group">
      <label for="Prospect" class="col-sm-6 control-label">Prospect</label>
      <div class="col-sm-6">
        <div class="radio">
          <label>
            <input type="radio" name="Prospect" value="1" checked="">
            Yes
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="Prospect" value="0">
            No
          </label>
        </div>
      </div>
    </div>
    <div class="form-group col-sm-6">
     <label for="DateOfAction">Date of action</label>
     <input type="text" class="form-control" name="DateOfAction">   
    </div>
    <div class="form-group col-sm-6">
     <label for="LastContactDate">Last contact date</label>
     <input type="text" class="form-control" name="LastContactDate">   
    </div>
    <div class="form-group col-sm-6">
     <label for="NextAction">Next action</label>
     <input type="text" class="form-control" name="NextAction">   
    </div>
    <div class="form-group col-sm-6">
     <label for="SalePercentage">Sale percentage</label>
     <input type="text" class="form-control" name="SalePercentage">   
    </div>
    <div class="form-group col-sm-6">
     <label for="CreditWorthy">Credit worthy</label>
     <input type="text" class="form-control" name="CreditWorthy">   
    </div>
    <div class="form-group col-sm-12">
     <input name="submit" type="submit" value="Add" class="btn btn-primary">     
    </div>   
      </form>



<div class='form-group'>
  <a class='btn btn-default' href='index.php'>Back</a>
</div>

<?php require'../templates/footer.php';?>