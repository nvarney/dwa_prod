<form method='POST' action='/users/p_signup'>

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
	
	Confirm Password<br>
	<input type='password' name='password_check'>
	<br><br>
	
	<!-- Display error if one is found -->
	<? if($error): ?>
		<div class='error'>
			<?=$error?>
		</div>
		<br>
	<? endif; ?>
	
	<input type='submit'>

</form> 