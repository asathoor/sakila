
<?php
/*
File: action.php
Purpose: INSERT INTO ...
*/

require_once 'header.php';

require_once 'db.php';

	if($_GET) { 
				
		$fn = $_GET['firstName'];
		$ln = $_GET['lastName'];	
		
		// format the sql
		$sql = "INSERT INTO `sakila`.`actor` (`actor_id`, `first_name`, `last_name`, `last_update`) VALUES (NULL, '" 
		. $fn 
		. "', '" 
		. $ln 
		. "', CURRENT_TIMESTAMP);";
					
		// INSERT
		$insert = $mysqli->query($sql);	
		mysqli_close($mysqli); // close connection
		
		echo "<p>New actor added: $fn $ln - Gee thanx a lot.</p>";
		echo $sql;
		
		
	}
	else {
		echo "<p>Error: Use the form please. No GET got.</p>";
	}

require_once 'footer.php';
?>
