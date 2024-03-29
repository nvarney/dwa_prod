<!DOCTYPE html>
<html>
<head>
	<title>µBlog: <?=@$title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	<link rel='stylesheet' href='/css/style.css' type='text/css'>

	<!-- JS -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
	<script src="/js/scripts.js"></script>
				
	<!-- Controller Specific JS/CSS -->
	<?=@$client_files; ?>
	
</head>

<body>	
	<!-- Start timer for JS -->
	
	<body onload = "startTimer()">

	<div id='menu'>	
		<div id='logo'>
			µBlog
		</div>
		
		<div id='menu_text'>
			<!-- Menu for users who are logged in -->
			<? if($user): ?>
				
				<a href='/users/logout'>Logout</a>
				<a href='/users/profile'>View your profile</a>
				<a href='/posts/users/'>Change who you're following</a>
				<a href='/posts/'>View posts</a>
				<a href='/posts/add'>Add a new post</a>
				<a href='/users/update_info'>Update your Information</a>
			
			<!-- Menu options for users who are not logged in -->	
			<? else: ?>
			
				<a href='/users/signup'>Sign up</a>
				<a href='/users/login'>Log in</a>
			
			<? endif; ?>
		</div>	
		
	</div>
	
	<!-- Display messages, including errors -->
	
	<? if($message): ?>
		<div id='message'>
			
				<?=$message?>
		</div>
	<? endif; ?>
	
	<!-- The page content -->
	<?=$content;?> 


</body>
</html>