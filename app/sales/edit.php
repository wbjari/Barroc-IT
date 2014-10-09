<?php 	require '../templates/header.php';
		require '../controllers/salesController.php';

if($_SESSION['role'] != 3)
{
	header('location: ../index.php');
}



if (isset($_POST['submit'])) 
{
  $id                 = $_GET['cid'];
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
  $query = "UPDATE customers SET 	CompanyName      = '$companyName',
                                  Adress1          = '$adress1',
                                  Zipcode1         = '$zipcode1',
                                  Residence1       = '$residence1',
                                  Adress2          = '$adress1',
                                  Zipcode2         = '$zipcode1',
                                  Residence2       = '$residence1',
                                  ContactPerson    = '$contactPerson',
                                  Initials         = '$initials',
                                  TelephoneNumber1 = '$telephoneNumber1',
                                  TelephoneNumber2 = '$telephoneNumber2',
                                  FaxNumber        = '$faxNumber',
                                  Email            = '$email',
                                  OfferNumbers     = '$offerNumbers',
                                  OfferStatus      = '$offerStatus',
                                  Prospect         = '$prospect',
                                  DateOfAction     = '$dateOfAction',
                                  LastContactDate  = '$lastContactDate',
                                  NextAction       = '$nextAction',
                                  SalePercentage   = '$salePercentage',
                                  CreditWorthy     = '$creditWorthy'
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

<form action="#" method="POST">
	<LEGEND>Edit</LEGEND>

    <div class="form-group col-sm-6">
     <label for="CompanyName">Company name*</label>
     <input value="<?php echo $row['CompanyName']; ?>" type="text" class="form-control" name="CompanyName" >    
    </div>

    <div class="form-group col-sm-6">
     <label for="Adress1">Address 1*</label>
     <input value="<?php echo $row['Adress1']; ?>" type="text" class="form-control" name="Adress1">   
    </div>

    <div class="form-group col-sm-6">
     <label for="Zipcode1">Zipcode 1*</label>
     <input value="<?php echo $row['Zipcode1']; ?>" type="text" class="form-control" name="Zipcode1" >    
    </div>

    <div class="form-group col-sm-6">
     <label for="Residence1">Residence 1*</label>
     <input value="<?php echo $row['Residence1']; ?>" type="text" class="form-control" name="Residence1">   
    </div>

    <div class="form-group col-sm-6">
     <label for="Adress2">Address 2</label>
     <input value="<?php echo $row['Adress2']; ?>" type="text" class="form-control" name="Adress2">   
    </div>

    <div class="form-group col-sm-6">
     <label for="Zipcode2">Zipcode 2</label>
     <input value="<?php echo $row['Zipcode2']; ?>" type="text" class="form-control" name="Zipcode2">   
    </div>

    <div class="form-group col-sm-6">
     <label for="Residence2">Residence 2</label>
     <input value="<?php echo $row['Residence2']; ?>" type="text" class="form-control" name="Residence2">   
    </div>

    <div class="form-group col-sm-6">
     <label for="ContactPerson">Contact person</label>
     <input value="<?php echo $row['ContactPerson']; ?>" type="text" class="form-control" name="ContactPerson">   
    </div>

    <div class="form-group col-sm-6">
     <label for="Initials">Initials</label>
     <input value="<?php echo $row['Initials']; ?>" type="text" class="form-control" name="Initials">   
    </div>

    <div class="form-group col-sm-6">
     <label for="TelephoneNumber1">Telephone 1*</label>
     <input value="<?php echo $row['TelephoneNumber1']; ?>" type="text" class="form-control" name="TelephoneNumber1">   
    </div>

    <div class="form-group col-sm-6">
     <label for="TelephoneNumber2">Telephone 2</label>
     <input value="<?php echo $row['TelephoneNumber2']; ?>" type="text" class="form-control" name="TelephoneNumber2">   
    </div>

    <div class="form-group col-sm-6">
     <label for="FaxNumber">Fax</label>
     <input value="<?php echo $row['FaxNumber']; ?>" type="text" class="form-control" name="FaxNumber">   
    </div>

    <div class="form-group col-sm-6">
     <label for="Email">Email*</label>
     <input value="<?php echo $row['Email']; ?>" type="text" class="form-control" name="Email">   
    </div>

    <div class="form-group col-sm-6">
     <label for="OfferNumbers">Offer numbers</label>
     <input value="<?php echo $row['OfferNumbers']; ?>" type="text" class="form-control" name="OfferNumbers">   
    </div>

    <div class="form-group col-sm-6">
     <label for="OfferStatus">Offer status</label>
     <input value="<?php echo $row['OfferStatus']; ?>" type="text" class="form-control" name="OfferStatus">   
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
     <input value="<?php echo $row['DateOfAction']; ?>" type="text" class="form-control" name="DateOfAction">   
    </div>

    <div class="form-group col-sm-6">
     <label for="LastContactDate">Last contact date</label>
     <input value="<?php echo $row['LastContactDate']; ?>" type="text" class="form-control" name="LastContactDate">   
    </div>

    <div class="form-group col-sm-6">
     <label for="NextAction">Next action</label>
     <input value="<?php echo $row['NextAction']; ?>" type="text" class="form-control" name="NextAction">   
    </div>

    <div class="form-group col-sm-6">
     <label for="SalePercentage">Sale percentage</label>
     <input value="<?php echo $row['SalePercentage']; ?>" type="text" class="form-control" name="SalePercentage">   
    </div>

    <div class="form-group col-sm-6">
     <label for="CreditWorthy">Credit worthy</label>
     <input value="<?php echo $row['CreditWorthy']; ?>" type="text" class="form-control" name="CreditWorthy">   
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