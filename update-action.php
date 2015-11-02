<h1>Update</h1>
<?php /*

File: update-action.php
Purpose: update sample

*/

/* string from PhpMyAdmin */
$sql = "UPDATE `sakila`.`actor` SET `first_name` = \'NICKy\' WHERE `actor`.`actor_id` = 2;";

/* stripslashes */
$sql = stripslashes($sql);

/* database connection */
require "db.php";

/* execute the query */

/* Test ----------

if($mysqli->query($sql)){
	echo "<p>Database updated</p>";
} else {
	echo "<p>Damn, something went wrong here!</p>";
}
------------- */

/* edit string from PhpMyAdmin */

/*
The form looked like this:
	...
	<td><input type='text' name='actorFirstName' value='<?php echo $firstName; ?>'></td>
	<td><input type='text' name='actorLastName' value='<?php echo $lastName; ?>'></td>
	...
	<td><input type='hidden' name='id' value='<?php echo $actorId; ?>'></td>
	...
*/

$firstName = $_REQUEST['actorFirstName'];
$lastName = $_REQUEST['actorLastName'];
$id = $_REQUEST['id'];

/* IMPORTANT NOTE */

// 
// add slashes, remove tags etc. here
//


/* SQL string with input from the form */
$sql = "UPDATE `sakila`.`actor` SET `first_name` = '". $firstName ."', `last_name` = '$lastName'  WHERE `actor`.`actor_id` = $id;";
?>

<p>SQL sentence: <?php echo $sql; ?></p>

<?php /* execute the query */
if( $mysqli->query( $sql ) ){
	echo "<p>Post $id updated to: $firstName $lastName</p>";
} else {
	echo "Now look at this mess. I cannot execute your query.";
};
?>