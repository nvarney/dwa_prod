<div id="wrapper">
	<h1>Today's Chore List</h1>
	<!-- The area where chores are added -->
	<div id="left-side">
		<!-- Due Date -->
		<h2>Time:</h2>
		Chores should be completed by :
		<input type="text" id="time">
		<br>
		
		<!-- Reward -->
		<h2>Reward:</h2>
		Reward for completing the chores by the set time:
		<input type="text" id="reward">
		<br>
		
		<!-- Chore List -->
		<h2>Add Chores:</h2>
		<input type="text" id="chore">
		<input type="button" id="add-chore" value="Add chore">
		<br>
		
		<!-- Start -->
		<h2>Ready?</h2>
		<input type="button" id="start" value="Start">
		<br>
	
	</div>
	
	<!-- The chore list -->
	<div id="right-side">
		<div id="chore-page">
			<div id="chore-timer">
			due at 12:00pm
			</div>
			<div id="chore-reward">
			five dollars
			</div>
			<div id="chore-list">
				<ul>
				<div id="chore-entries">
					<li>Clean dishes</li>
				</div>
				</ul>
			</div>
		</div>
	</div>
	
	<div class="footer">
	</div>
</div>
<br>