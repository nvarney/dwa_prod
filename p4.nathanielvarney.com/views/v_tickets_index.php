<div id="page-description" class="ui-body ui-body-c">
	<h2>IT Computer Drop-Off Form</h2>
	<p>With this form, you can submit a ticket for your new computer setup, computer re-image, virus removal, or other general issue. 
	Just fill out the requested information, submit the form, and hand your laptop to a Helpdesk assistant. 
	Let us know if you have any questions.  <p>
	<p>-The Helpdesk</p>
</div>


	<form name="new-ticket" id="ticket-form" method="POST" action="/tickets/p_ticket" data-ajax="true">
		<div data-role="fieldcontain" id="ticketType">
			<fieldset data-role="controlgroup">
				<legend>Ticket Type:</legend>
					<label for="setup">PC Setup</label>
					<input type="radio" name="subject" id="setup" value="New PC Setup" checked="checked" />
					<label for="re-image">Computer Re-image</label>
					<input type="radio" name="subject" id="re-image" value="Computer Re-Image" />
					<label for="virus">Virus Removal</label>
					<input type="radio" name="subject" id="virus" value="Virus Removal" />
					<label for="other-issue">Other Issue</label>
					<input type="radio" name="subject" id="other-issue" value="Other Issue" />	
			</fieldset>
		</div>
	
		<div data-role="fieldcontain">
		 <label for="name">Name:</label>
		 <input type="text" name="name" id="name" class="general_input required" size="25" minlength="4" placeholder="John Harvard" value=""  />
		</div>
		
		<div data-role="fieldcontain">
		 <label for="email">Email Address:</label>
		 <input type="text" name="email" id="email" class="general_input required email" size="30" placeholder="jharvard@hsph.harvard.edu" value=""  />
		</div>
		
		<div data-role="fieldcontain">
		 <label for="phone">Telephone:</label>
		 <input type="tel" name="phone" id="phone" class="general_input required" size="20" minlength="5" placeholder="(617) 432-4357" value=""  />
		</div>
		
		<div data-role="fieldcontain">
			<label for="model" class="select">Computer Model:</label>
			<select name="model" id="model" data-native-menu="false" data-theme="c">
				<option>Choose Computer Model</option>
				<optgroup label="Dell">
					<option class="dell" value="Dell Optiplex" selected>Optiplex</option>
					<option class="dell" value="Dell Latitude">Latitude</option>
					<option class="dell" value="Dell Precision">Precision</option>
				</optgroup>
				<optgroup label="Lenovo/IBM">
					<option class="lenovo" value="Lenovo ThinkPad">ThinkPad</option>
					<option class="lenovo" value="Lenovo ThinkStation">ThinkStation</option>
					<option class="lenovo" value="Lenovo ThinkCentre">ThinkCentre</option>
				</optgroup>
				<optgroup label="Apple">
					<option class="apple" value="Apple MacBook Pro">MacBook Pro</option>
					<option class="apple" value="Apple MacBook Air">MacBook Air</option>
					<option class="apple" value="Apple iMac">iMac</option>
					<option class="apple" value="Apple Mac Mini">Mac Mini</option>
					<option class="apple" value="Apple Mac Pro">Mac Pro</option>
				</optgroup>
				<optgroup label="Other">
					<option value="Samsung">Samsung</option>
					<option value="Toshiba">Toshiba</option>
					<option value="HP">HP</option>
					<option value="Acer">Acer</option>
					<option value="Asus">Asus</option>
					<option value="Other">Other Computer</option>
				</optgroup>
			</select>
		</div>
		
		<div data-role="fieldcontain">
		 <label for="serial">Computer Serial #:<a href="#serialImage" data-rel="popup" id="model-pop-btn" data-position-to="window" data-role="button" data-inline="true" data-transition="fade" data-icon="info" data-mini="true" data-iconpos="notext">How do I find my serial number?</a></label>
		 <input type="text" name="serial" id="serial" class="general_input required" size="25" minlength="6" placeholder="L3AKV71" value=""  />
		</div>
		
		<div data-role="popup" id="serialImage" data-overlay-theme="a" data-theme="d" data-corners="false">
			<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
			<img id="dellSerial" class="serialPhoto" src="/images/dell-serial.jpeg" alt="Dell Serial Number">
			<img id="lenovoSerial" class="serialPhoto" src="/images/lenovo-serial.jpeg" alt="Lenovo Serial Number">
			<img id="appleSerial" class="serialPhoto" src="/images/apple-serial.png" alt="Apple Serial Number">
		</div>
		
		<div data-role="fieldcontain">
		 <label for="notes">Notes:</label>
		 <textarea name="notes" id="notes" class="general_input" placeholder="Enter any special instructions or requests here" value=""></textarea>
		</div>
		
		<div class="ui-body ui-body-c">
			<fieldset class="ui-grid-a">
				<div class="ui-block-a"><a href="/tickets" data-role="button" data-theme="c" data-ajax="false">Cancel</a></div>
				<div class="ui-block-b"><button type="submit" data-theme="b">Submit</button></div>
			</fieldset>
		</div>		
	</form>
	
	<br>
	<br>