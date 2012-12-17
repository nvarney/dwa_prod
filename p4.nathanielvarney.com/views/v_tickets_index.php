<div id="page-description" class="ui-body ui-body-c">
	<h2>IT Computer Drop-Off Form</h2>
	<p>With this form, you can submit a ticket for your new computer setup, computer re-image, virus removal, or other general issue. 
	Just fill out the requested information, submit the form, and hand your laptop to a Helpdesk assistant. 
	Let us know if you have any questions.  <p>
	<p>-The Helpdesk</p>
</div>


	<form name="new-ticket" id="ticket-form" method="POST" action="/tickets/p_ticket" data-ajax="true"">
		<div data-role="fieldcontain">
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
					<option value="dell-optiplex" selected>Optiplex</option>
					<option value="dell-latitude">Latitude</option>
					<option value="dell-precision">Precision</option>
				</optgroup>
				<optgroup label="Lenovo/IBM">
					<option value="lenovo-thinkpad">ThinkPad</option>
					<option value="lenovo-thinkstation">ThinkStation</option>
					<option value="lenovo-thinkcentre">ThinkCentre</option>
				</optgroup>
				<optgroup label="Apple">
					<option value="apple-macbookpro">MacBook Pro</option>
					<option value="apple-macbookair">MacBook Air</option>
					<option value="apple-imac">iMac</option>
					<option value="apple-macmini">Mac Mini</option>
					<option value="apple-macpro">Mac Pro</option>
				</optgroup>
			</select>
		</div>
		
		<div data-role="fieldcontain">
		 <label for="serial">Computer Serial #:</label>
		 <input type="text" name="serial" id="serial" class="general_input required" size="25" minlength="8" placeholder="L3AKV71" value=""  />
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