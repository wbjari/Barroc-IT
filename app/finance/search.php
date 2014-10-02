<?php 	require '../templates/header.php';
		require '../controllers/invoiceController.php';

if($_SESSION['role'] != 1)
{
	header('location: ../index.php');
}
$search = mysqli_real_escape_string($con, $_GET['search']);
$query= "SELECT * FROM customers WHERE";
?>

<div class="panel-text">
    <h1>Finance panel</h1>
</div>
  <div class='float_btn'>
	<a class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
  </div>
  				<form action="search.php" method="get" name="search">
					<input id="search-bar" type="text" name="search">
					<input id="search-button" type="submit" value="Search" class="btn btn-primary">
				</form>
<table class='table table-striped'>
		<thead>
			<tr>
				<td class="col-sm-2">Companyname</td>
				<td class="col-sm-2">Adress</td>
				<td class="col-sm-2">Activated invoices</td>
				<td class="col-sm-2">Deactivated invoices</td>
			</tr>
			</tr>
		</thead>
		<tbody>
		<?php
$search = trim($search);					
		if ($search){
			$query .= " CustomerNR = '". $search ."' 
			OR CompanyName LIKE '%". $search ."%' 
			OR Adress1 LIKE '%". $search ."%'";
			$result = mysqli_query($con,$query);
			$row = mysqli_num_rows($result);
			
			if($row > 0){

				while($row = mysqli_fetch_assoc($result)){ 
					 echo '<tr>';
			         echo '<td>' . $row['CompanyName'] . '</td>';
			         echo '<td>' . $row['Adress1'] . '</td>';
			         echo '<td> <a class="btn btn-primary"href="activate.php?cid=' . $row['CustomerNR'] . '"</a> View </td>';
			         echo '<td> <a class="btn btn-primary"href="deactivate.php?cid=' . $row['CustomerNR'] . '"</a> View </td>';
			         echo '</tr>';        
							}
					}
			}
	
							
						?>
		</tbody>
</table>
<div class='form-group'>
  <a class='btn btn-default' href='index.php'>Back</a>
</div>

<?php require'../templates/footer.php';?>