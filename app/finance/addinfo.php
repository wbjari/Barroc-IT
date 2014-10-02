<?php   require '../templates/header.php';
    require '../controllers/invoiceController.php';

if($_SESSION['role'] != 1)
{
  header('location: ../index.php');
}

if (isset($_POST['submit'])) 
{
  // error_reporting(E_ALL ^ E_NOTICE);
  $id = $_GET['cid'];
  $BankaccountNr = mysqli_real_escape_string($con, $_POST['BankaccountNr']);
  $Credit = mysqli_real_escape_string($con, $_POST['Credit']);
  $RevenueAmount = mysqli_real_escape_string($con, $_POST['RevenueAmount']);
  $Limit = mysqli_real_escape_string($con, $_POST['Limit']);
  $LedgerAccount = mysqli_real_escape_string($con, $_POST['LedgerAccount']);
  $BKR = mysqli_real_escape_string($con, $_POST['BKR']);
/*  $query = "INSERT INTO customers (BankaccountNr, Credit, RevenueAmount, Limit, LedgerAccount, BKR)
                        VALUES    ('$BankaccountNr','$Credit','$RevenueAmount','$Limit1', '$LedgerAccount', '$BKR')";*/
  $query = "UPDATE customers SET BankaccountNr = '$BankaccountNr', 
                                Credit = '$Credit', 
                                RevenueAmount = '$RevenueAmount',  
                                `Limit` = '$Limit', 
                                LedgerAccount = '$LedgerAccount',
                                BKR = '$BKR'
                                WHERE CustomerNR = '$id' LIMIT 1";
  $result = mysqli_query($con, $query);
  
    Header("location: ./index.php");  
      
}
if(isset($_GET['cid']))
{
  $id = $_GET['cid'];
  $update = "SELECT * FROM customers WHERE CustomerNR = '$id' ";
  $r_update = mysqli_query($con,$update);}
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
<form action="" method="POST">
  <LEGEND>Add</LEGEND>
    <div class="form-group col-sm-6">
     <label for="BankaccountNr">Bank account number</label>
     <input value="<?php echo $row['BankaccountNr']; ?>" type="text" class="form-control" name="BankaccountNr" >    
    </div>

    <div class="form-group col-sm-6">
     <label for="Credit">Credit</label>
     <input value="<?php echo $row['Credit']; ?>" type="text" class="form-control" name="Credit">   
    </div>

    <div class="form-group col-sm-6">
     <label for="RevenueAmount">Revenue amount</label>
     <input value="<?php echo $row['RevenueAmount']; ?>" type="text" class="form-control" name="RevenueAmount" >    
    </div>

    <div class="form-group col-sm-6">
     <label for="LedgerAccount">Ledger account</label>
     <input value="<?php echo $row['LedgerAccount']; ?>" type="text" class="form-control" name="LedgerAccount">   
    </div>

    <div class="form-group col-sm-6">
     <label for="BKR">BKR</label>
     <input value="<?php echo $row['BKR']; ?>" type="text" class="form-control" name="BKR" >    
    </div>

    <div class="form-group col-sm-6">
     <input name="submit" type="submit" value="Edit" class="btn btn-primary">     
    </div>   
      </form>
  <?php
  }
  ?>



<div class='form-group col-sm-12'>
  <a class='btn btn-default' href='index.php'>Back</a>
</div>
<?php require'../templates/footer.php';?>