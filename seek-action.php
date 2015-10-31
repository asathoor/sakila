<?php
/*
file: seek-action.php
purpose: seek a work query
by: petj

* tip: use the search option in PHPMyAdmin in order to create the $sql
* tip: don't use the php escape characters \.

*/

/* from input to  query */
function word($what){
		
		/* mysqli database connection */
		require_once "db.php";

		/* headline printed */		
		print "<h2>Searching: $what</h3>";
		
		/* format the sql */
		$sql = "SELECT * FROM `sakila`.`actor` 
			WHERE (
			CONVERT(`actor_id` USING utf8) LIKE '%" . $what . "%' 
			OR CONVERT(`first_name` USING utf8) LIKE '%" . $what . "%' 
			OR CONVERT(`last_name` USING utf8) LIKE '%" . $what . "%' ) 
			ORDER BY `first_name`";
			
		/* mysqli query */
		$result =  $mysqli->query($sql); // query

		/* loop out the result */
		while($row = $result->fetch_assoc()){
   	 	echo $row['first_name'] . " ";
    		echo $row['last_name']. '<br />';
   	}
   	
	mysqli_close($mysqli); 
				
	} // ends word

/* Fire the function off if the OK button has been pressed */
if(isset($_GET['OK'])) {
	word($_GET['seek']);
}
?>