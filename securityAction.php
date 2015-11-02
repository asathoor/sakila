<h1>Protect In and Output</h1>

Server-side protection.

<h2>Result of your Query</h2>

<p>Your query: <?php echo $_GET['search']; ?></p>

<p>Warning: that's not secure at all!</p>

<h3>Remove HTML tags</h3>

Use strip_tags( $yourQueryHere ):

<?php
$searchQuery = $_GET['search'];

$searchQuery = strip_tags( $searchQuery );

echo "You searched for <strong>: " . $searchQuery . "</strong>";
// (display search results here)
?>

<h3>Add slashes \</h3>

<p>This is not secure for databases: <?php echo $searchQuery; ?>.</p>

<p>Addslashes will make it secure in a database: <strong>

<?php $searchQuery = addslashes( $searchQuery ); 
echo $searchQuery;
?>
</strong>

<p>More secure because it's just a plain string.</p>

<h3>Output: Remove slashes (again!) </h3>
<p> The slashes don't look nice at all in your output. In order to remove the slashes use stripslashes: 

<?php echo stripslashes($searchQuery); ?>

</p>


