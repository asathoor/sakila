<?php
/*
File: update.php
Purpose: delete something in the Sakila sample database
*/

require_once 'header.php'; // html header
require_once 'db.php'; // the mysqli object

$sql = "SELECT * FROM `actor`\n"
    . "ORDER BY `actor`.`first_name` ASC"; // a query created in PhpMyAdmin
    
$result =  $mysqli->query($sql); // query

/* will print out a html form */
function theUpdateForm($firstName, $lastName, $actorId){
	?>
	<tr>	
	<form action="update-action.php" method='get' enctype='multipart/form-data'>
		<td><input type='text' name='actorFirstName' value='<?php echo $firstName; ?>'></td>
		<td><input type='text' name='actorLastName' value='<?php echo $lastName; ?>'></td>
		<td><input type='hidden' name='id' value='<?php echo $actorId; ?>'></td>
		<td><input type="submit" name="update" value="Update"> <input type="reset" name="Cancel" value="Cancel"></td>
	</form>
	</tr>
	<?php
}
// theUpdateForm('Anton','Berg',43);
?>

<h2>Update</h2>

<p>Here you can update the actor names.</p>

<!-- A table for the actors -->
<table>

<?php
// looping out a table of actors with a deletebutton too.
while($row = $result->fetch_assoc()){
	
	theUpdateForm($row['first_name'],$row['last_name'],$row[actor_id]);
}
?>

</table>

<?php require_once('footer.php'); // html footer ?>
