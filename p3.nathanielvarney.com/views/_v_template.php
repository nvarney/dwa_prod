<!DOCTYPE html>
<html>
<head>
	<title><?=@$title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	

	<link rel="stylesheet" href="css/chores.css" type="text/css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
	
	<!-- JS -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery.timer.js"></script>
	<!--<script type="text/javascript" src="js/jquery.countdown.js"></script>-->
	<script type="text/javascript" src="js/chores.js"></script>			
	
	<!-- Controller Specific JS/CSS -->
	<!-- Omitting because none are needed
	<?=@$client_files; ?>
	-->
	
</head>

<body>	

	<?=$content;?> 

</body>
</html>