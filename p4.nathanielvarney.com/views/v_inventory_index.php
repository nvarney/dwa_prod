<div data-role="content">
	<div class="content-primary">	
		<div>
		<ul class="ui-body ui-body-a" data-type="horizontal"><!--data-role="listview" data-filter="true">-->
			<? foreach($active as $active): ?>
		<!--		
						<div class="ui-body ui-body-a ui-grid-d" data-type="horizontal" >
			<div class="ui-block-a" data-role="button" data-inline="true"><?=$active['name']?></div>
			<div class="ui-block-b" data-role="button" data-inline="true"><?=$active['model']?> <?=$active['serial']?></div>
			<div class="ui-block-c" data-role="button" data-inline="true"><?=$active['ticket_id']?></div>
			<div class="ui-block-d" data-role="button" data-inline="true"><? echo date("F j, Y", $active['created']); ?></div>
			<div class="ui-block-e" data-role="button" data-inline="true" data-icon="delete" data-iconpos="right"><?=$active['location']?></div>
		</div>
		-->		
			<li>	
						<?=$active['name']?> 
						<?=$active['model']?> 
						<?=$active['serial']?>
						<?=$active['ticket_id']?>
						<? echo date("F j, Y", $active['created']); ?>
						<?=$active['location']?>
					
				</li>
			<? endforeach; ?>
			</ul>
		</div>	
	
	
	
	
	
	
	
	
	
	
	
	<!--	<ul data-role="listview" data-content="filter">
			<li class="ui-btn-active">
				<div class="ui-grid-d">
					<div class="ui-block-a">Name</div>
					<div class="ui-block-b">Model & Serial</div>
					<div class="ui-block-c">Ticket #</div>
					<div class="ui-block-d">Modified</div>
					<div class="ui-block-e">Location</div>
				</div>
			</li>
			<? foreach($active as $active): ?>
				<li>
				<div class="ui-grid-d">
					<div class="ui-block-a"><?=$active['name']?></div>
					<div class="ui-block-b"><?=$active['model']?> <?=$active['serial']?></div>
					<div class="ui-block-c"><?=$active['ticket_id']?></div>
					<div class="ui-block-d"><? echo date("F j, Y", $active['created']); ?></div>
					<div class="ui-block-e">
						<?=$active['location']?>
						<button data-icon="delete" data-iconpos="right" data-mini="true" data-inline="true">Return</button>
					</div>
				</div>
				</li>
			<? endforeach; ?>
		</ul>
	</div>
</div>
<? foreach($active as $active): ?>
		<div data-role="controlgroup" data-type="horizontal" >
			<div data-role="button"><?=$active['name']?></div>
			<div data-role="button"><?=$active['model']?> <?=$active['serial']?></div>
			<div data-role="button"><?=$active['ticket_id']?></div>
			<div data-role="button"><? echo date("F j, Y", $active['created']); ?></div>
			<div data-role="button" data-icon="delete" data-iconpos="right"><?=$active['location']?></div>
		</div>
<? endforeach; ?>
-->


<? foreach($returned as $returned): ?>
	
	<div class="returned">
		
		<div class="returned_head">
			<?=$returned['location']?> <?=$returned['name']?> <?=$returned['model']?> <?=$returned['serial']?> on <? echo date("F j, Y", $returned['created']); ?>:
		</div>
		
		<div id="footer"></div>
		
	</div>

<? endforeach; ?>