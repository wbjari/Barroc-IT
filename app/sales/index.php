<?php

require '../templates/header.php'; 
require '../../config/config.php';	

if($_SESSION['role'] != 3)
{
	header('location: ../index.php');
}

?>
<div class="panel-text">
	<h1>Sales panel: Customers</h1>
</div>
  <div class='float_btn'>
    <a class='btn btn-primary' href='../general/comment.php'>Comments</a>
    <a title="Logout" class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
  </div>
  <div class='button_add'>
    <a title="Add customer" style="margin-right:5px;" class='btn btn-primary' href='<?php echo "add.php"?>'><span class="glyphicon glyphicon-plus"></span></a>
  </div>
<div class="search-marginleft">
   <form action="search.php" method="get" name="search">
    <input placeholder="Search for company name" id="search-bar" type="text" name="search" >
     <input title="Search" id="search-button" type="submit" value="Search" class="btn btn-primary">
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
        <th>Active<br/>appointments</th>
        <th>Inactive<br/>appointments</th>
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

        mysqli_close($con);
      ?>
      </tbody>
	</table>
</div>

