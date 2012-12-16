<? foreach($active as $active): ?>
	
	<div class="active">
		
		<div class="active_head">
			<?=$active['location']?> <?=$active['name']?> <?=$active['model']?> <?=$active['serial']?> on <? echo date("F j, Y", $active['created']); ?>:
		</div>
		
		<div id="footer"></div>
		
	</div>

<? endforeach; ?>

<? foreach($returned as $returned): ?>
	
	<div class="returned">
		
		<div class="returned_head">
			<?=$returned['location']?> <?=$returned['name']?> <?=$returned['model']?> <?=$returned['serial']?> on <? echo date("F j, Y", $returned['created']); ?>:
		</div>
		
		<div id="footer"></div>
		
	</div>

<? endforeach; ?>