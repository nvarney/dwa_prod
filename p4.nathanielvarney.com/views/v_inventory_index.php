<div data-role="content" data-theme="b" data-ajax="false">
	<h2>Active Computers</h2>
		<p>These are the computers currently at the helpdesk</p>
            <table data-role="table" id="active-computers" data-mode="reflow" class="table-stroke ui-body-a">
              <thead>
                <tr>
                  <th data-priority="1">Ticket Number</th>
                  <th data-priority="2">Name</th>
                  <th data-priority="2">Model</th>
                  <th data-priority="3">Serial #</th>
                  <th data-priority="4">Date Changed</th>
                  <th data-priority="4">Location</th>
                </tr>
              </thead>
              <tbody>
            	<? foreach($active as $active): ?>
                <tr>
                  <th><?=$active['ticket_id']?></th>
                  <td class="title"><?=$active['name']?></td>
                  <td><?=$active['model']?></td>
                  <td><?=$active['serial']?></td>
                  <td><? echo date("F j, Y", $active['modified']); ?></td>
                  <td><?=$active['location']?><a href='/inventory/return_pc/<?=$active['serial']?>'><button data-icon="delete" data-iconpos="right" data-mini="true" data-inline="true">Return</button></a></td>
                </tr>
            	<? endforeach; ?>
         	</tbody>
   	 </table> 


	<h2>Returned Computers</h2>
		<p>These are the computers have recently been returned to customers</p>
            <table data-role="table" id="returned-computers" data-mode="reflow" class="table-stroke ui-body-a">
              <thead>
                <tr>
                  <th data-priority="1">Ticket Number</th>
                  <th data-priority="2">Name</th>
                  <th data-priority="2">Model</th>
                  <th data-priority="3">Serial #</th>
                  <th data-priority="4">Date Changed</th>
                  <th data-priority="4">Location</th>
                </tr>
              </thead>
              <tbody>
            	<? foreach($returned as $returned): ?>
                <tr>
                  <th><?=$returned['ticket_id']?></th>
                  <td class="title"><?=$returned['name']?></td>
                  <td><?=$returned['model']?></td>
                  <td><?=$returned['serial']?></td>
                  <td><? echo date("F j, Y", $returned['modified']); ?></td>
                  <td><?=$returned['location']?></td>
                </tr>
            	<? endforeach; ?>
         	</tbody>
   	 </table> 
</div>
