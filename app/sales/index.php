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
<div class="row">
	<table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Company name</th>
        <th>Contact person</th>
        <th>E-mail address</th>
        <th>Telephone number</th>
        <th>Prospect</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        $result = mysqli_query($con, 'SELECT * FROM sales ORDER BY id ASC');

        while($row = mysqli_fetch_array($result)) {
          echo '<tr>';
          echo '<td>'. $row['companyname'] . '</td>';
          echo '<td>'. $row['contactperson'] . '</td>';
          echo '<td>'. $row['email'] . '</td>';
          echo '<td>'. $row['telephone'] . '</td>';
          echo '<td>'. $row['prospect'] . '</td>';
          echo '<td width=200>';
          echo '<a class="btn btn-success" href="view.php?id='.$row['id'].'">View</a>';
          echo '</tr>';
        }

        mysqli_close($con);
      ?>
      </tbody>
	</table>
</div>

