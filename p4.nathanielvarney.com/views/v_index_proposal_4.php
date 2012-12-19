<h1>Touch Friendly Ticket Submission</h1>

<h2>Description:</h2>
	I work at the HSPH helpdesk and we have recently started developing a line at the desk. Often these are either people dropping off a laptop computer to be repaired or a new computer setup. My plan is to setup a touchscreen at the desk where people can check in their own computers and not have to wait in line. To drive this functionality my project 4 will be a webapp that gathers the necessary information from users, submits it to our ticketing database, and sends them an email confirmation.

<h2>Features:</h2>
<ul>
	<li>
		The site will be written to utilize jQuery so that it is easy to use on a touch panel (although a keyboard will be provided to the user for data entry)
	</li>
	<li>
		The site will dynamically change the information that is being requested based on responses and show relevant help (e.g. selecting a Dell as the computer model will show a popup of it’s serial number location)
	</li>
	<li>
		The site will automatically enter a ticket into our ticketing system database (after properly checking input values). For the purpose of this project it will simply be a test database.
	</li>
	<li>
		The site will generate an email to send to the person with all the information they entered as a receipt
	</li>
	<li>
		The site will also feature an inventory database (password accessible) that will let Helpdesk staff track computers and check them back out.
	</li>
</ul>

<img src="/images/P4_proposal_01.png" width="300" alt="Proposed ticket page">
<img src="/images/P4_proposal_02.png" width="300" alt="Proposed inventory page">

<h2>Inspiration:</h2>
<ul>
	<li><a href="http://jquerymobile.com/">JQuery Mobile</a></li>
	<li><a href="https://apps.sph.harvard.edu/publisher/forms/index.cfm?id=6ca6b78f-9adb-4573-9c46-d1594df0b456">Current HSPH New Setup Webform</a></li>
	<li><a href="http://m.newegg.com/">NewEgg's Mobile Site</a></li>
</ul>
