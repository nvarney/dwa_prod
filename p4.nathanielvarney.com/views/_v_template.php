<!DOCTYPE html>
<html>
<head>
	<title><?=@$title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<!-- Set page width to device width -->	
	<meta name="viewport" content="width=device-width, initial-scale=1">
  
  	<!-- CSS -->
  	<link rel="stylesheet" href="/css/HSPH.css" />
  	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile.structure-1.2.0.min.css" />
  	<link rel="stylesheet" href="/css/p4.css" />
	
	<!-- JS -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
	<script src="http://malsup.github.com/jquery.form.js"></script>
	<script type="text/javascript" src="/js/p4.js"></script>
				
	<!-- Controller Specific JS/CSS -->
	<?=@$client_files; ?>
	
</head>

<body>
	<div data-role="page">	
		
		<div data-role="header">
			<div class="logo-container">
				<a href="/" class="ui-link">
					<div class="header-logo"></div>
				</a>
			</div>
			<a href="/" id="login-button" class="ui-btn-right" data-icon="gear" data-iconpos="notext" data-theme="c">Login</a>
		</div>
		
		<div data-role="content">
			<?=$content;?> 
		</div>
	
		<div data-role="footer">
			<h4>Page Footer</h4>
		</div>
	
	</div>
</body>
</html>