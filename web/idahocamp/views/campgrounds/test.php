<?php
require "connections.php";
$db = get_db();

$statement = $db->prepare("SELECT id, name, image, description, location, author FROM camp_site");
$statement->execute();


// Go through each result
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	// The variable "row" now holds the complete record for that
	// row, and we can access the different values based on their
	// name
	$book = $row['name'];
	$chapter = $row['image'];
	$verse = $row['description'];
	$content = $row['author'];

	echo "<p><strong>$book $chapter:$verse</strong> - \"$content\"<p>";
}

?> 