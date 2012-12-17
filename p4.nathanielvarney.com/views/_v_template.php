<!DOCTYPE html>
<html>
<head>
	<title><?=@$title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<!-- Set page width to device width -->	
	<meta name="viewport" content="width=device-width, initial-scale=1">
  
  	<!-- CSS -->
  	<link rel="stylesheet" href="/css/hsph.css" />
  	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile.structure-1.2.0.min.css" />
  	<link rel="stylesheet" href="/css/p4.css" />
	
	<!-- JS -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
	<script src="http://malsup.github.com/jquery.form.js"></script>
	<script type="text/javascript" src="/js/jquery.validate.js"></script>
	<script type="text/javascript" src="/js/additional-methods.js"></script>
	<script type="text/javascript" src="/js/p4.js"></script>
				
	<!-- Controller Specific JS/CSS -->
	<?=@$client_files; ?>
	
</head>

<body>
	<div data-role="page">	
		
		<!-- Header containing home link, logo, and login link -->
		<div data-role="header">
			<a href="/tickets" data-role="button" class="ui-btn-left" data-icon="home" data-mini="true" data-iconpos="notext">Return to Ticket Form</a>
			<div class="logo-container">
				<a href="http://www.hsph.harvard.edu/it" class="ui-link" rel="external">
					<div class="header-logo"></div>
				</a>
			</div>
			<!-- Login box to access the inventory page -->
			<a href="#popupLogin" data-rel="popup" id="login-button" class="ui-btn-right" data-icon="gear" data-iconpos="notext" data-theme="b">Login to view inventory</a>
		</div>
		
		<!-- Div for the login popup window -->
		<div data-role="popup" id="popupLogin" data-overlay-theme="b" data-theme="a" class="ui-corner-all">
			<form method="POST" action="/index/p_login">
				<div style="padding:10px 20px;">
				  <h3>Helpdesk Staff Login</h3>
		          <label for="un" class="ui-hidden-accessible">Email:</label>
		          <input type="text" name="email" id="email" value="" placeholder="username" data-theme="a" />

		          <label for="pw" class="ui-hidden-accessible">Password:</label>
		          <input type="password" name="password" id="password" value="" placeholder="password" data-theme="a" />

		    	  <button type="submit" data-theme="b">Sign in</button>
				</div>
			</form>
		</div>
		
		<!-- Page content is inserted here -->
		<div data-role="content" data-theme="a">
			<?=$content;?> 
		</div>
	
		<!-- Footer with copyright information -->
		<div data-role="footer" class="footer-docs" data-theme="e">
			<div class="footer-text">
			<p>&copy; 2012 Nathan Varney for HSPH IT</p>
			<div>
		</div>
	
	</div>
</body>
</html>