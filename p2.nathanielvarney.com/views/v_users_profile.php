<h2>This is the profile of <?=$user->first_name?></h2>

<div class="post">
	<img class="user_thumb" src=<?=$user->user_image_url?> alt=<?=$user->first_name?>>	
	
	<div class="post_head">
		About Me:
	</div>
	
	<div class="post_body">
		<?=$user->about_user?>
	</div>
	
	<div id="footer"></div>
	
</div>

<h2>Here's what you've posted</h2>

<? foreach($posts as $post): ?>
		
	<div class="post">	
		<div class="post_head">
			<?=$post['first_name']?> <?=$post['last_name']?> posted on <? echo date("F j, Y", $post['p_created']); ?>:
		</div>
		
		<div class="post_body">
			<?=$post['content']?>
		</div>
		
		<div id="footer"></div>
		
	</div>


<? endforeach; ?>