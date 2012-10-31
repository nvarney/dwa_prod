<? foreach($posts as $post): ?>
	
	<h2>
	<img src=<?=$post['user_image_url']?> width=100 height=100>
	<?=$post['first_name']?> <?=$post['last_name']?> posted:</h2>
	<?=$post['content']?>
	
	<br><br>

<? endforeach; ?>