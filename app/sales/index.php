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
      </tr>
    </thead>
	</table>
</div>

