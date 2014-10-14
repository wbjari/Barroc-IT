<?php 	require '../templates/header.php';
		require '../controllers/invoiceController.php';

if($_SESSION['role'] != 1) 
{
	header('location: ../index.php');
}
?>


<div class="panel-text">
    <h1>Finance panel</h1>
</div>
  <div class='float_btn'>
	<a class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
  </div>  
  <div class='float_btn'>
	<a class='btn btn-primary' href='../general/comment.php'>Comments</a>
  </div>
  				<form action="search.php" method="get" name="search">
					<input id="search-bar" type="text" name="search" >
					<input id="search-button" type="submit" value="Search" class="btn btn-primary">
				</form>

<table class='table table-striped'>
		<thead>
			<tr>
				<td class="col-sm-2">Companyname</td>
				<td class="col-sm-2">Bank account number</td>
				<td class="col-sm-2">Credit</td>
				<td class="col-sm-2">Revenue amount</td>
				<td class="col-sm-2">Limit</td>
				<td class="col-sm-2">Ledger account</td>
				<td class="col-sm-2">BKR</td>
				<td class="col-sm-2">Unpaid invoices</td>
				<td class="col-sm-2">Paid invoices</td>
				<td class="col-sm-2">Edit</td>
				<td class="col-sm-2">Invoice number</td>
			</tr>
		</thead>
		<tbody>
		<?php
		while ($row = mysqli_fetch_assoc($r_invoices)) 
        {
        	$id = $row['CustomerNR'];
        	$implodes = implode(" ", $row);
        	echo '<tr>';
        	echo '<td>' . $row['CompanyName'] . '</td>';
        	echo '<td>' . $row['BankaccountNr'] . '</td>';
        	//Bereking credit 
        	$credit = "SELECT SUM(Amount) FROM invoices WHERE CustomerNR = '$id' AND Status = 1";
        	$r_credit = mysqli_query($con, $credit); 
        	$r_limitCheck = mysqli_query($con, $credit); 
        		while($rows2 = mysqli_fetch_assoc($r_credit))
				{
					$credit1 = implode("", $rows2);
					echo '<td>' . $credit1 . '</td>';
					$insert2 = "UPDATE customers SET Credit = '$credit1' WHERE CustomerNR = '$id' LIMIT 1";
          			$result = mysqli_query($con, $insert2);
				}
         
         		// Berekening revenue amount 
         		$sum = "SELECT SUM(Amount) AS RevenueAmount FROM invoices WHERE CustomerNR = '$id'";
		 		$r_sum = mysqli_query($con, $sum); 
         		
         		while($rows1 = mysqli_fetch_assoc($r_sum))
				{			
					$sum1 = implode("", $rows1);
					echo '<td>' . $sum1 . '</td>';
					$insert1 = "UPDATE customers SET RevenueAmount = '$sum1' WHERE CustomerNR = '$id' LIMIT 1";
         			$result = mysqli_query($con, $insert1);
				}
				
				//Check of credit hoger is dan limit
				while($checkLimit = mysqli_fetch_assoc($r_limitCheck))
				{
					$creditCheck = implode("", $checkLimit);
					$limitCheck = $row['Limit'];
					if($creditCheck > $limitCheck)
					{
	         			echo '<td> <div class="limitCheck">' . $row['Limit'] . '</div></td>';
	     			}
	     			else
	     			{
	     				echo '<td>' . $row['Limit'] . '</td>';
	     			}	
	     		}
			    echo '<td>' . $row['LedgerAccount'] . '</td>';
			    echo '<td>' . $row['BKR'] . '</td>';
			      	
		       	//Check of BKR Y of N is
		        $bkrcheck = "SELECT * FROM customers WHERE BKR = 'Y' AND CustomerNR = '$id'";
		        $r_bkrcheck = mysqli_query($con, $bkrcheck);
		        
		        if(mysqli_num_rows($r_bkrcheck) > 0){
		        echo '<td> <a class="btn btn-primary"href="activate.php?cid=' . $row['CustomerNR'] . '"</a> View </td>';
			       echo '<td> <a class="btn btn-primary"href="deactivate.php?cid=' . $row['CustomerNR'] . '"</a> View </td>';
			   	}
			   	else{
		    	echo '<td> <a class="btn btn-warning"href=""</a> Check </td>';
		        echo '<td> <a class="btn btn-warning"href=""</a> BKR </td>';
		    	}
		        echo '<td> <a class="btn btn-success"href="addinfo.php?cid=' . $row['CustomerNR'] . '"</a> Edit </td>';
		        
		        //Count aantal facturen
				$count = "SELECT COUNT(InvoiceNR) AS NumberOfInvoices FROM invoices WHERE CustomerNR = '$id' AND Status = 1" ;
				$r_count = mysqli_query($con, $count); 
				
				while($rows = mysqli_fetch_assoc($r_count))
				{
					$counter = implode("", $rows);
					echo '<td>' . $counter . '</td>';
					$insert2 = "UPDATE customers SET NumberOfInvoices = '$counter' WHERE CustomerNR = '$id' LIMIT 1";
         			$result1 = mysqli_query($con, $insert2);
				}
         		echo '</tr>';  
        }   
		?>     
		</tbody>
</table>
<?php require'../templates/footer.php';?>