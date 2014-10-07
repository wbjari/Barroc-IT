<?php

require '../templates/header.php'; 
require '../../config/config.php';	

if($_SESSION['role'] != 3)
{
	header('location: ../index.php');
}

?>
<div class="panel-text">
	<h1>Sales panel: Customers
</div>
  <div class='float_btn'>
    <a class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
  </div>
  <div class='button_add'>
    <a class='btn btn-primary' href='<?php echo "add.php"?>'>Add</a>
  </div>
<div class="search-marginleft">
   <form action="search.php" method="get" name="search">
    <input id="search-bar" type="text" name="search" >
     <input id="search-button" type="submit" value="Search" class="btn btn-primary">
  </form>
</div>
<div class="row">
	<table class="table table-striped">
    <thead>
      <tr>
        <th>Company name</th>
        <th>Contact person</th>
        <th>E-mail address</th>
        <th>Telephone number</th>
        <th>Fax number</th>
        <th>Prospect</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        $result = mysqli_query($con, 'SELECT * FROM customers ORDER BY CustomerNR ASC');

        while($row = mysqli_fetch_array($result)) {
          echo '<tr>';
          echo '<td>'. $row['CompanyName'] . '</td>';
          echo '<td>'. $row['ContactPerson'] . '</td>';
          echo '<td>'. $row['Email'] . '</td>';
          echo '<td>'. $row['TelephoneNumber1'] . '</td>';
          echo '<td>'. $row['FaxNumber'] . '</td>';
          echo '<td>'. $row['Prospect'] . '</td>';
          echo '<td width=200>';
          echo '<a class="btn btn-success" href="view.php?id='.$row['CustomerNR'].'">View</a>';
          echo '</tr>';
        }

        mysqli_close($con);
      ?>
      </tbody>
	</table>
</div>

