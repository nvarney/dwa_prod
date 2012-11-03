<form float='LEFT' width='430px' method='POST' action='/users/p_login'>

	Email<br>
	<input type='text' name='email'>	
	<br><br>
	
	Password<br>
	<input type='password' name='password'>
	<br><br>
	
	<? if($error): ?>
		<div class='error'>
			Login failed. Please double check your email and password.
		</div>
		<br>
	<? endif; ?>

	<input type='submit'>

</form>

<form float='RIGHT' width='430px' method='POST' action='/users/p_signup'>

	First Name<br>
	<input type='text' name='first_name'>
	<br><br>
	
	Last Name<br>
	<input type='text' name='last_name'>
	<br><br>

	Email<br>
	<input type='text' name='email'>
	<br><br>
	
	Password<br>
	<input type='password' name='password'>
	<br><br>
	
	<input type='submit'>

</form> 