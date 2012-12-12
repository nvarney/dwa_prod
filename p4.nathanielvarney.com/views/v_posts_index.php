
<h2> Here's what your friends have to say: </h2>

<? foreach($posts as $post): ?>
	
	<div class="post">
		<img class="user_thumb" src=<?=$post['user_image_url']?> alt=<?=$post['first_name']?>>	
		
		<div class="post_head">
			<?=$post['first_name']?> <?=$post['last_name']?> posted on <? echo date("F j, Y", $post['p_created']); ?>:
		</div>
		
		<div class="post_body">
			<?=$post['content']?>
		</div>
		
		<div id="footer"></div>
		
	</div>

<? endforeach; ?>