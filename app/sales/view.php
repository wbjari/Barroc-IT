<?php
require '../templates/header.php';
require '../../config/config.php';  

if(isset($_GET['id'])){
	$id=$_GET['id'];

	$query=mysqli_query($con, "SELECT * FROM customers WHERE CustomerNR = '$id'");
	while($row = mysqli_fetch_assoc($query)){
		$CompanyName = $row['CompanyName'];
		$Adress1 = $row['Adress1'];
		$Zipcode1 = $row['Zipcode1'];
		$Residence1 = $row['Residence1'];
		$Adress2 = $row['Adress2'];
		$Zipcode2 = $row['Zipcode2'];
		$Residence2 = $row['Residence2'];
		$ContactPerson = $row['ContactPerson'];
		$Initials = $row['Initials'];
		$TelephoneNumber1 =  $row['TelephoneNumber1'];
		$TelephoneNumber2 = $row['TelephoneNumber2'];
		$FaxNumber = $row['FaxNumber'];
		$Email = $row['Email'];
	  $IBAN = $row['BankaccountNr'];
	  $Credit = $row['Credit'];
    $invoiceNumbers = $row['NumberOfInvoices'];
	  $RevenueAmount = $row['RevenueAmount'];
    $Limit = $row['LimitAmount'];
    $LedgerAccount = $row['LedgerAccount'];	    $BKR = $row['BKR'];
		$OfferNumbers = $row['OfferNumbers'];
		$OfferStatus = $row['OfferStatus'];
		$DateOfAction = $row['DateOfAction'];
		$LastContactDate = $row['LastContactDate'];
		$NextAction = $row['NextAction'];
		$SalePercentage = $row['SalePercentage'];
    $Prospect = $row['Prospect'];
		$CreditWorthy = $row['CreditWorthy'];
    $OpenProjects = $row['OpenProjects'];
	  $Applications = $row['Applications'];
	  $InternalContactPerson = $row['InternalContactPerson'];
	  $Active = $row['Active'];
	}
	?>

	<div class="user-table col-sm-6">
		<h2>Viewing <?php echo $CompanyName;?></h2>
		<table class="table table-striped">
		<tbody>
		<tr>
			<td><strong>Company name</strong></td>
			<td><?php echo $CompanyName;?></td>
		</tr>
		<tr>
			<td><strong>Adress1</strong></td>
			<td><?php echo $Adress1;?></td>
		</tr>
		<tr>
			<td><strong>Zipcode1</strong></td>
			<td><?php echo $Zipcode1;?></td>
		</tr>
		<tr>
			<td><strong>Residence1</strong></td>
			<td><?php echo $Residence1;?></td>
		</tr>
		<tr>
			<td><strong>Adress2</strong></td>
			<td><?php echo $Adress2;?></td>
		</tr>
		<tr>
			<td><strong>Zipcode2</strong></td>
			<td><?php echo $Zipcode2;?></td>
		</tr>
		<tr>
			<td><strong>Residence2</strong></td>
			<td><?php echo $Residence2;?></td>
		</tr>
		<tr>
			<td><strong>Contact person</strong></td>
			<td><?php echo $ContactPerson;?></td>
		</tr>
		<tr>
			<td><strong>Initials</strong></td>
			<td><?php echo $Initials;?></td>
		</tr>
		<tr>
			<td><strong>Telephone number1</strong></td>
			<td><?php echo $TelephoneNumber1;?></td>
		</tr>
		<tr>
			<td><strong>Telephone number2</strong></td>
			<td><?php echo $TelephoneNumber2;?></td>
		</tr>
		<tr>
			<td><strong>Fax number</strong></td>
			<td><?php echo $FaxNumber;?></td>
		</tr>
		<tr>
			<td><strong>E-mail</strong></td>
			<td><?php echo $Email;?></td>
		</tr>
		<tr>
			<td><strong>IBAN</strong></td>
			<td><?php echo $IBAN;?></td>
		</tr>
		<tr>
			<td><strong>Credit</strong></td>
			<td><?php echo $Credit;?></td>
		</tr>
		<tr>
			<td><strong>Invoice numbers</strong></td>
			<td><?php echo $invoiceNumbers;?></td>
		</tr>
		<tr>
			<td><strong>Revenue Amount</strong></td>
			<td><?php echo $RevenueAmount;?></td>
		</tr>
		<tr>
			<td><strong>Limit</strong></td>
			<td><?php echo $Limit;?></td>
		</tr>
		<tr>
			<td><strong>Ledger account</strong></td>
			<td><?php echo $LedgerAccount;?></td>
		</tr>
		<tr>
			<td><strong>BKR</strong></td>
			<td><?php echo $BKR;?></td>
		</tr>
		<tr>
			<td><strong>Offer numbers</strong></td>
			<td><?php echo $OfferNumbers;?></td>
		</tr>
		<tr>
			<td><strong>Offer status</strong></td>
			<td><?php echo $OfferStatus;?></td>
		</tr>
		<tr>
			<td><strong>Date of action</strong></td>
			<td><?php echo $DateOfAction;?></td>
		</tr>
		<tr>
			<td><strong>Last contact date</strong></td>
			<td><?php echo $LastContactDate;?></td>
		</tr>
		<tr>
			<td><strong>Next action</strong></td>
			<td><?php echo $NextAction;?></td>
		</tr>
		<tr>
			<td><strong>Sales percentage</strong></td>
			<td><?php echo $SalePercentage;?></td>
		</tr>
		<tr>
			<td><strong>Prospect</strong></td>
			<td><?php echo $Prospect;?></td>
		</tr>
		<tr>
			<td><strong>Credit worthy</strong></td>
			<td><?php echo $CreditWorthy;?></td>
		</tr>
		<tr>
			<td><strong>Open projects</strong></td>
			<td><?php echo $OpenProjects;?></td>
		</tr>
		<tr>
			<td><strong>Internal contact person</strong></td>
			<td><?php echo $InternalContactPerson;?></td>
		</tr>
		<tr>
			<td><strong>Active</strong></td>
			<td><?php echo $Active;?></td>
		</tr>
		</div>
		<tbody>
	</div>
    </body>
    </html>
    <?php
}





?>