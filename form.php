<?php require_once 'boilerplate/boiler_header.php'; ?>

<!-- Input form -->
<form action="action.php" method="get">
	<fieldset>
		<legend>Enter an actor here</legend>
		First Name <input type="text" name="firstName"><br>
		Last Name <input type="text" name="lastName"><br>
		
		<!-- buttons -->
		<input type="submit" name="submit" value="submit">
		<button name="Cancel" value="Cancel" type="reset">Cancel</button>
	</fieldset>
</form>

<?php require_once 'boilerplate/boiler_footer.php'; ?>