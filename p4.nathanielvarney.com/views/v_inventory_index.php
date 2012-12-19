<div data-role="content" data-theme="b" data-ajax="false">

	<!-- List computers whose location is currently set to the Helpdesk -->
	<h2>Active Computers</h2>
		<p>These are the computers currently at the helpdesk</p>
           <ul data-role="listview" data-filter="true" data-inset="true" data-split-icon="delete" data-theme="a" data-split-theme="b">
			<? foreach($active as $active): ?>
			<li><a href="#"> <!--link to nothing because links looked better in the list -->
				<h2><?=$active['name']?></h2>
				<p><?=$active['model']?>  <?=$active['serial']?> </p>
				<p><?=$active['ticket_id']?> <? echo date("F j, Y", $active['modified']); ?> </p>
				<!-- Links to function for changing the computer's location in the database -->
				</a><a href='/inventory/return_pc/<?=$active['serial']?>'>Return Computer</a>
			</li>
			<? endforeach; ?>
		</ul>	

	<!-- List computers where location is currently set to Other -->
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
		<a href="/tickets/logout" data-role="button" data-inline="true" data-theme="b">Logout</a>
	</div>
	
</div>
