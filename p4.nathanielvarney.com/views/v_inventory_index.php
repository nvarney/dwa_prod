<!-- Generates a list of computers whose location is currently set to Helpdesk -->
<!-- Each item has a link that can be used to remove it from the active list -->
<!-- Lists can be filtered to make computers easy to find -->
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
		</ul>	

	<!-- List of computers with their location set to "Returned", so, no longer active -->
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
			
	<!-- Logout button -->
	<div id="logoutButton">
		<a href="/inventory/logout" data-role="button" data-inline="true" data-theme="b">Logout</a>
	</div>
	

</div>
