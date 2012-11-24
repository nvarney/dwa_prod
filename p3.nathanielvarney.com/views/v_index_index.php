<div id="wrapper">
	<h1>Today's Chore List</h1>
	<!-- The area where chores are added -->
	<div id="left-side">
		<!-- Due Date -->
		<h2>Time:</h2>
		Time to complete chores:
		<br>
		Hours:
		<input type="text" class="time-select" id="chore-h" disabled="disabled">
		<br>
		<div class="time-slider" id="hour-slider"></div>
		Minutes:
		<input type="text" class="time-select" id="chore-m" disabled="disabled">
		<br>
		<div class="time-slider" id="min-slider"></div>
		<br>
		
		<!-- Reward -->
		<h2>Reward:</h2>
		Reward for completing the chores by the set time:
		<input type="text" id="reward">
		<br>
		
		<!-- Chore List -->
		<h2>Add Chores:</h2>
		<input type="button" id="add-chore" value="Add chore">
		<div id="chore-entry">
		<input type="text"  id="chore-name">
		<br>
		<textarea id="chore-desc" rows="5" cols="50">Enter chore description</textarea>
		<br>
		<input type="button" id="chore-submit" value="Add">
		</div>
		
		<!-- Start -->
		<h2>Ready?</h2>
		<input type="button" id="start" value="Start">
		<input type="button" id="pause" value="Pause">
		<br>
	
	</div>
	
	<!-- The chore list -->
	<div id="right-side">
		<div id="chore-page">
			<div id="chore-timer">
			Time remaining:
			</div>
			<div id="chore-reward">
			<h2> Your reward: </h2>
			</div>
			<div id="chore-list">
				<ul>
				<div id="chore-entries">
					<!--<li>Clean dishes</li>-->
				</div>
				</ul>
			</div>
		</div>
	</div>
	
	<div class="footer">
	</div>
</div>
<br>