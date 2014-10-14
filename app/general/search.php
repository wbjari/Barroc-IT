<?php 	require '../templates/header.php';
		require '../../config/config.php';
$query = "SELECT * FROM comments";
$r_query = mysqli_query($con, $query);
if(!$_SESSION['role'])
{
	header('location: ../index.php');
}

if (isset($_POST['submit'])) 
{
  // error_reporting(E_ALL ^ E_NOTICE);
  $Date = mysqli_real_escape_string($con, $_POST['Date']);
  $Subject = mysqli_real_escape_string($con, $_POST['Subject']);
  $Description = mysqli_real_escape_string($con, $_POST['Description']);

  $query = "INSERT INTO comments (Date, Subject, Description)
                        VALUES    ('$Date','$Subject','$Description')";
  $result = mysqli_query($con, $query);

    Header("location: comment.php");  
      
}
$search = mysqli_real_escape_string($con, $_GET['search']);
$query1= "SELECT * FROM comments WHERE";
?>


<div class="panel-text">
    <h1>General panel</h1>
</div>
  <div class='float_btn'>
	<a class='btn btn-primary' href='<?php echo "../controllers/authController.php?logout=true"?>'>Logout</a>
  </div>
  				<form action="search.php" method="get" name="search">
					<input id="search-bar" type="text" name="search" >
					<input id="search-button" type="submit" value="Search" class="btn btn-primary">
				</form>
<table class='table table-striped'>
		<thead>
			<tr>
				<td class="col-sm-2">ID</td>
				<td class="col-sm-2">Date</td>
				<td class="col-sm-2">Subject</td>
				<td class="col-sm-2">Description</td>
			</tr>
		</thead>
		<tbody>
		<?php
$search = trim($search);          
    if ($search){
      $query1 .= " id = '". $search ."' 
      OR Date LIKE '%". $search ."%' 
      OR Subject LIKE '%". $search ."%'
      OR Description LIKE '%" . $search . "%'";
      $result = mysqli_query($con, $query1);
      $row = mysqli_num_rows($result);
      
      if($row > 0){
		while ($row = mysqli_fetch_assoc($result)) 
        {
        	echo '<tr>';
        	echo '<td>' . $row['id'] . '</td>';
        	echo '<td>' . $row['Date'] . '</td>';
        	echo '<td>' . $row['Subject'] . '</td>';
        	echo '<td>' . $row['Description'] . '</td>';
         	echo '</tr>';  
        }   
      }
      else
         {
          echo "No results have been found. Please try again.";
         }
}
        
else
  {
  echo "Please enter a word into the search function.";
  }
		?>     
		</tbody>
</table>
<form action="" method="POST">
	<LEGEND>Add</LEGEND>
    <div class="form-group col-sm-6">
     <label for="Date" >Date</label>
     <input type="date" class="form-control" name="Date" placeholder="Text" required>    
    </div>
    <div class="form-group col-sm-6">
     <label for="Subject" >Subject</label>
     <input type="text" class="form-control" name="Subject" placeholder="150" required>    
    </div>
    <div class="form-group col-sm-6">
     <label for="Description" >Description</label>
     <input type="text" class="form-control" name="Description" placeholder="5" required>   
    </div>
    <div class="form-group col-sm-12">
     <input name="submit" type="submit" value="Add" class="btn btn-primary">     
    </div>   
</form>
<div class='form-group'>
  <div class ='float_left'>
    <a class='btn btn-default' href='comment.php'>Back</a>
  </div>
</div>
<?php require'../templates/footer.php';?>