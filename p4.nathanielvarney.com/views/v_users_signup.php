<? if($message): ?>
	<div id='message'>	
		<?=$message?>
	</div>
<? endif; ?>
	
<form id="user-signup" method='POST' action='/users/p_signup'>
	<p> This form only exists for site demo purposes. You can create a login to access the helpdesk side of the site (but this won't exist for the full, LDAP linked version). </p>

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
	<input id="user-password" type='password' name='password'>
	<br><br>
	
	Confirm Password<br>
	<input type='password' name='password_check'>
	<br><br>
	
	<button type="submit" data-theme="b">Submit</button>

</form> 