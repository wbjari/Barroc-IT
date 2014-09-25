<?php require '../templates/header.php';?>
<?php require '../../config/config.php';?>
	<form method="post" action="../controllers/authController.php" role="form" class="login-form col-md-4 col-md-offset-4">
		<fieldset>
			<legend><h2>Login</h2></legend>
			<div class='form-group'>
				<label for='username'> Username </label>
				<input type='username'name='username' id='username' class='form-control'>
			</div>
			<div class='form-group'>
				<label for='password'> Password </label>
				<input type='password'name='password' id='password' class='form-control'>
			</div>
			<div class='form-group'>
				<input type='submit'name='authUser' id='Login' class='btn btn-large' value='Login'>
			</div>
		</fieldset>
	</form>
<?php require 'templates/footer.php'; ?>