<?php 	require '../templates/header.php';
		require '../controllers/invoiceController.php';

if($_SESSION['role'] != 3)
{
	header('location: ../index.php');
}
$search = mysqli_real_escape_string($con, $_GET['search']);
$query = "SELECT * FROM customers WHERE";
$searchValue = "HOI";
?>

<div class="panel-text">
    <h1>Sales panel</h1>
</div>
  <div class='float_btn'>
	<a class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
  </div>
  				<form action="search.php" method="get" name="search">
					<input id="search-bar" value="<?php echo $searchValue ?>" type="text" name="search">
					<input id="search-button" type="submit" value="Search" class="btn btn-primary">
				</form>
<table class='table table-striped'>
		<thead>
			<tr>
				<th>Company name</th>
		        <th>Contact person</th>
		        <th>E-mail address</th>
		        <th>Telephone number</th>
		        <th>Fax number</th>
		        <th>Prospect</th>
		        <th>Active<br/>appointments</th>
		        <th>Inactive<br/>appointments</th>
		        <th></th>
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
          echo '<td>'. $row['CompanyName'] . '</td>';
          echo '<td>'. $row['ContactPerson'] . '</td>';
          echo '<td>'. $row['Email'] . '</td>';
          echo '<td>'. $row['TelephoneNumber1'] . '</td>';
          echo '<td>'. $row['FaxNumber'] . '</td>';
          echo '<td>'. $row['Prospect'] . '</td>';
          echo '<td><a title="View active appointments of this customer"
                class="btn btn-success" href="activeAppointments.php?id='.$row['CustomerNR'].'">
                <span class="glyphicon glyphicon-ok"></span></a></td>';
          echo '<td><a title="View inactive appointments of this customer"
                class="btn btn-success" href="inactiveAppointments.php?id='.$row['CustomerNR'].'">
                <span class="glyphicon glyphicon-remove"></span></a></td>';
          echo '<td><a title="View more information about this customer"
                class="btn btn-success" href="view.php?id='.$row['CustomerNR'].'">
                <span class="glyphicon glyphicon-eye-open"></span></a></td>';
          echo '</tr>';
					}
			}
	}
							
						?>
		</tbody>
</table>
<div class='form-group'>
  <a class='btn btn-default' href='index.php'><span class="glyphicon glyphicon-chevron-left"></span></a>
</div>

<?php require'../templates/footer.php';?>