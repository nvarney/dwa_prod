<h1>This is the profile of <?=$user->first_name?></h1>

<div id="about_me">
	<p> And this is where the description would go </p>
</div>

<div id="posts">
	<? foreach($posts as $post): ?>
	
	<h2>
	<img src=<?=$post['user_image_url']?> width=100 height=100 alt=<?=$post['first_name']?>>
	<?=$post['first_name']?> <?=$post['last_name']?> posted:</h2>
	<?=$post['content']?>
	
	<br><br>

	<? endforeach; ?>
</div>