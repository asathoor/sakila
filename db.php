<?php
/** 
 * file: db.php 
 * purpose: connector
*/
$host = "localhost";
$password = "password";
$user = "root";
$database = "sakila";

// connect
$mysqli = new mysqli( $host, $user, $password, $database ); // creates the object
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error; // if error messages
}

// test 
echo "Your're connected to the database via: " 
. $mysqli->host_info 
. "\n";
?>
