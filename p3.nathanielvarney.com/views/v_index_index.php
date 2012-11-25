<div id="wrapper">
	<br>
	<h1>Today's Chore List</h1>
	<!-- The area where chores are added -->
	<div id="left-side">
		<!-- Due Date -->
		<h2>Time:</h2>
		Time to complete chores:
		<br>
		Hours:
		<input type="text" class="time-select text-field" id="chore-h" disabled="disabled">
		<br>
		<div class="time-slider" id="hour-slider"></div>
		Minutes:
		<input type="text" class="time-select text-field" id="chore-m" disabled="disabled">
		<br>
		<div class="time-slider" id="min-slider"></div>
		<br>
		
		<!-- Reward -->
		<h2>Reward:</h2>
		Reward for completing the chores by the set time:
		<br>
		<input class="text-field" type="text" id="reward">
		<br>
		<br>
		
		<!-- Chore List -->
		<h2>Add Chores:</h2>
		<!-- Load Saved Chores -->
		<input type="button" class="button" id="load-chores" value="Load saved chores">
		<div id="saved-chores"></div>
		<br>
		
		<!-- Add Chores to list -->
		<div id="chore-entry">
		Chore Name:
		<br>
		<input type="text" class="text-field"  id="chore-name">
		<br>
		<br>
		Chore Requirements:
		<textarea class="text-field" id="chore-desc" rows="5" cols="50" 
		title="Enter each requirement on a new line."></textarea>
		<br>
		<input type="button" class="button" id="chore-submit" value="Add">
		</div>
		<br>
		
		<!-- Timer Buttons -->
		<h2>Ready?</h2>
		<input type="button" class="button" id="start" value="Start">
		<input type="button" class="button" id="pause" value="Pause">
		
		<!-- Print Button -->
		<input type="button" class="button" id="print-button" value="Print">
		
		<!-- Clear the saved chores -->
		<input type="button" class="button" id="clear-storage" value="Delete saved chores">
		<br>
	
	</div>
	
	<!-- The chore list -->
	<div id="right-side">
		<div id="chore-page">
			<div id="chore-timer">
			Time remaining:
			</div>
			<div id="chore-reward">
			<h2> Reward: </h2>
			</div>
			<div id="chore-list">
				<div id="chore-entries">
				</div>
			</div>
		</div>
	</div>
	
	<div class="footer">
	</div>
</div>
<br>