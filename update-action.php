<h1>Update</h1>
<?php /*

File: update-action.php
Purpose: update sample

*/

/* string from PhpMyAdmin */
//$sql = "UPDATE `sakila`.`actor` SET `first_name` = \'NICKy\' WHERE `actor`.`actor_id` = 2;";

/* stripslashes */
$sql = stripslashes($sql);

/* database connection */
require "db.php";

$firstName = $_REQUEST['actorFirstName'];
$lastName = $_REQUEST['actorLastName'];
$id = $_REQUEST['id'];

$sql = "UPDATE `sakila`.`actor` SET `first_name` = '". $firstName ."' WHERE `actor`.`actor_id` = ". $id .";";
?>

<p>SQL sentence: <?php echo $sql; ?></p>

<?php /* execute the query */
if( $mysqli->query( $sql ) ){
	echo "<p>Post $id updated to: $firstName $lastName</p>";
} else {
	echo "Now look at this mess. I cannot execute your query.";
};
?>
