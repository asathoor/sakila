<?php include "header.php"; ?>

<h1>Search Actor Names in the Sakila database</h1>

<!-- a very basic form --> 
<form action="seek-action.php" method="get" enctype="multipart/form-data">
	<input type="text" name="seek" value="seek">
	<button name="OK" value="ok" type="submit">OK</button>
	<input type="reset" name="reset" value="reset">
</form>

<?php include "header.php"; ?>