% CRUD - INSERT
% by Per Thykjaer Jensen
% Fall 2015

# CRUD and PHP

Today's topic is:

* CREATE
* READ
* UPDATE
* DELETE

----

# SQL for read

~~~~
$sql = "SELECT * FROM `actor` 
ORDER BY `actor`.`first_name` ASC";
~~~~

----

# The connection

* file: db.php

~~~~
<?php
// CONNECT TO THE SAKILA DATABASE

$mysqli = new mysqli("localhost (or URL)", 
	"USER", 
	"PASSWORD",
	"DATABASE");
?>
~~~~

----

# READ

Just to repeat the read:

## The Query

~~~~
$sql = "SELECT * FROM `actor` 
	ORDER BY `actor`.`first_name` ASC";
$result =  $mysqli->query($sql); // query
~~~~

----

# READ loop out the content

*$result->fetch_assoc()* will create an object organized as an array.
Now you can loop out the rows using a *while loop*:

~~~~
while($row = $result->fetch_assoc()){
    echo $row['first_name'] . " ";
    echo $row['last_name']. '<br />';
   }

mysqli_close($mysqli); 
~~~~

----

# The finished file:

* See: *read.php*

----

# INSERT

1. Create a form like: *insert.php*
2. Create the action: *action.php*

----

# INSERT form insert.php

~~~~
<form action="action.php" method="get">
	<fieldset>
		<legend>Enter an actor here</legend>  
	First Name <input type="text" name="firstName"><br>
	Last Name <input type="text" name="lastName"><br>
	<input type="submit" name="submit" value="submit">
	<button name="Cancel" value="Cancel" type="reset">Cancel</button>
	</fieldset>
</form>
~~~~

----

# INSERT action: action.php

If you don't care for security, make your SQL string thus:

~~~~

$sql = "INSERT INTO `sakila`.`actor` 
(`actor_id`, `first_name`, `last_name`, `last_update`) 
VALUES (NULL, '".$_GET['firstName']."', ' 
'".$_GET['lastName']."', CURRENT_TIMESTAMP);";

~~~~
____

# Test your SQL string

Just to be sure, test:

~~~~
echo $sql;
~~~~

----

# INSERT query

Now use mysqli to insert:

~~~~
$insert = $mysqli->query($sql);	
~~~~

Open PHPMyAdmin and see the result.

----

# The INSERT files

* insert.php (html form)
* action.php (insert query)

----

# Exercise: design an insert form

1. Open a table in PhpMyAdmin.
2. Design a form with fields for all rows.
3. In PhpMyAdmin: insert a post in the table.
4. Copy the SQL string to your action.php.
5. Add the insert query to action.php.
6. Test your file.

----

# Security

Never ever trust anyone!

----

# Security: validate data

1. Clienside: use HTML5 form validation.
2. Serverside: validate input.

See [HTML Form Attributes](http://www.w3schools.com/html/html_form_attributes.asp)

----

# Security: Serverside

See [@BeginningPHP, "Checking Input and Encoding Output" s. 679 ff.]

----

# UPDATE

1. Loop out relevant data in a form.
2. In the action file use UPDATE.

----

# UPDATE

* file: update.php

----

# UPDATE form function

~~~~
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
~~~~
----

# UPDATE loop

~~~~
<table>
<?php
// looping out a table of actors with a deletebutton too.
while($row = $result->fetch_assoc()){	
	theUpdateForm($row['first_name'],$row['last_name'],$row[actor_id]);
}
?>
</table>
~~~~

----

# UPDATE actions

* file: update-action.php

----

# Update data from the form

~~~~
$firstName = $_REQUEST['actorFirstName'];
$lastName = $_REQUEST['actorLastName'];
$id = $_REQUEST['id'];
~~~~

----

# Security

* Yezzz .... you should!

----

# UPDATE SQL

~~~~
$sql = "UPDATE `sakila`.`actor` 
SET `first_name` = '". $firstName ."', 
`last_name` = '$lastName' 
WHERE `actor`.`actor_id` = $id;";
~~~~

----

# UPDATE query

~~~~
$mysqli->query( $sql ) 
~~~~

----

# Exercises

Now choose a table, and create forms and actions for:

* either CREATE
* or READ
* or UPDATE
* or DELETE posts

... in a table of your own choice.
