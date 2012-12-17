<div data-role="content" data-theme="b" data-ajax="false">
	<h2>Active Computers</h2>
		<p>These are the computers currently at the helpdesk</p>
           <ul data-role="listview" data-filter="true" data-inset="true" data-split-icon="delete" data-theme="a" data-split-theme="b">
			<? foreach($active as $active): ?>
			<li><a href="#">
				<h2><?=$active['name']?></h2>
				<p><?=$active['model']?>  <?=$active['serial']?> </p>
				<p><?=$active['ticket_id']?> <? echo date("F j, Y", $active['modified']); ?> </p>
				</a><a href='/inventory/return_pc/<?=$active['serial']?>'>Return Computer</a>
			</li>
			<? endforeach; ?>
			
			<li><a href="#">
				<img src="images/album-bb.jpg" />
				<h3>Broken Bells</h3>
				<p>Broken Bells</p>
				</a><a href="#purchase" data-rel="popup" data-position-to="window" data-transition="pop">Purchase album</a>
			</li>
		</ul>	

	<h2>Returned Computers</h2>
		<p>These are the computers have recently been returned to customers</p>
            <ul data-role="listview" data-filter="true" data-inset="true" data-theme="a" data-split-theme="b">
			<? foreach($returned as $returned): ?>
			<li><div>
				<h2><?=$returned['name']?></h2>
				<p><?=$returned['model']?>  <?=$returned['serial']?> </p>
				<p><?=$returned['ticket_id']?> <? echo date("F j, Y", $returned['modified']); ?> </p>
				</div>
			</li>
			<? endforeach; ?>
		</ul>
</div>
