<? foreach($posts as $post): ?>
	
	<h2>
	<img src=<?=$post['user_image_url']?> width=100 height=100 alt=<?=$post['first_name']?>>
	<?=$post['first_name']?> <?=$post['last_name']?> posted on <? echo date("F j, Y", $post['p_created']); ?>:</h2>
	<?=$post['content']?>
	
	<br><br>

<? endforeach; ?>