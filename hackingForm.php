<html><head></head><body>
<?php /*

file: form-hack.php
purpose: testing security issues

*/ ?>

<html>
<head>
<title>Form Hack</title>

</head>
<body>
	<form method ="get" action ="hackingTest.php">
	<input name = "theHacker" value ="your attack" size="80">
	<input type="submit" name="Submit" value="Submit">
</form>

</body>
</html>