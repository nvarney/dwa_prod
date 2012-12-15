<div data-role="content">
		<div class="content-primary">

		<form method='POST' action='/tickets/p_ticket'>

			<h2>Form elements</h2>

			<p>This page contains various progressive-enhancement driven form controls. Native elements are sometimes hidden from view, but their values are maintained so the form can be submitted normally. Browsers that don't support the custom controls will still deliver a usable experience because all are based on native form elements.</p>
			
			<p>There is a complete set of <a href="forms-all-mini.html">mini-sized</a> form elements which are useful for toolbars or tighter spaces. <a href="forms-all-compare.html">Compare mini and normal</a> form elements side-by-side.</p>

			<div data-role="fieldcontain">
			    <fieldset data-role="controlgroup" data-type="horizontal" data-theme="a">
			     	<legend>Ticket Type:</legend>
			         	<label for="setup">PC Setup</label>
			         	<input type="radio" name="ticket-type" id="setup" value="pc-setup" checked="checked" />
			         	<label for="virus">Virus Removal</label>
			         	<input type="radio" name="ticket-type" id="virus" value="virus" />
			         	<label for="other-issue">Other Issue</label>
			         	<input type="radio" name="ticket-type" id="other-issue" value="other-issue" />
			    </fieldset>
			</div>

			<div data-role="fieldcontain">
	         <label for="first_name">First Name:</label>
	         <input type="text" name="first_name" id="first_name" class="general_input" value=""  />
			</div>
			
			<div data-role="fieldcontain">
	         <label for="last_name">Last Name:</label>
	         <input type="text" name="last_name" id="last_name" class="general_input" value=""  />
			</div>
			
			<div data-role="fieldcontain">
	         <label for="first_name">Email Address:</label>
	         <input type="text" name="email" id="email" class="general_input" value=""  />
			</div>
			
			<div data-role="fieldcontain">
	         <label for="phone">Telephone:</label>
	         <input type="text" name="phone" id="phone" class="general_input" value=""  />
			</div>
			
			<div data-role="fieldcontain">
				<label for="model" class="select">Computer Model:</label>
				<select name="model" id="model" data-native-menu="false" data-theme="a">
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
	         <input type="text" name="serial" id="serial" class="general_input" value=""  />
			</div>
			
			<div data-role="fieldcontain">
	         <label for="notes">Notes:</label>
	         <textarea name="notes" id="notes" class="general_input" value=""></textarea>
			</div>
						
		</form>
		</div>
</div>