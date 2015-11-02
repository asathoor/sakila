<?php /*
file: hackingTest.php
purpose: test security

read more: http://www.sitepoint.com/php-security-blunders/

*/

/* Introitus */
echo "<h1>Security Issues</h2><h2>- the attack and the cure</h2>";

/* Plain input from the form */
$attack = $_GET['theHacker'];

/* echo out the form stuff */
echo "<h3>From the Form</h3>";
echo "Output: " . $attack;

/* database connection */
echo "<h3>Database Connection</h3>\n<p>";
require "db.php";
echo "</p>";

/* INSERT something */
echo "<h3>INSERT via the form</h3>";
echo "Trying to hack ... thus: $attack";

/* The hack */

// sql insert here:
$fn = "A000";
$ln = $_GET['theHacker']; // 

// format the INSERT sql
$sql = "INSERT INTO `sakila`.`actor` (`actor_id`, `first_name`, `last_name`, `last_update`) VALUES (NULL, '" 
. $fn 
. "', '" 
. $_GET['theHacker']
. "', CURRENT_TIMESTAMP);";

// unprepared
echo "Unprepared: " . $sql;

// INSERT
$insert = $mysqli->query($sql);	

echo "<p>Executed save ...</p>";

/* READ the more or less disturbing result */

/* SQL dump of the actor table */
$sql = "SELECT * FROM `actor` ORDER BY `actor`.`first_name` ASC LIMIT 7";
    
$result =  $mysqli->query($sql); // query

/* READ the table */
echo "<h3>Top 7 of the table Actors</h3><div>";

// looping out the result
while($row = $result->fetch_assoc()){
    echo $row['first_name'] . " ";
    echo $row['last_name']. '<br />';
   }

echo "</div>";
?>

<p>
	<a href="delete.php">The delete list</a>
</p>

<?php /* close connection */
$mysqli->close(); ?>