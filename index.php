<?php 

require_once __DIR__ . '/includes/scripts/database.php';

// step 1 connect to database
$connection = getConnection();

// step 2 run a query against our database
$query = mysqli_query($connection, 'SELECT * FROM issues;');

// step 3 fetch all the results (not best practice)
$results = mysqli_fetch_all($query, MYSQLI_ASSOC);
var_dump($results);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP and HTML</title>
</head>
<body>
	<h1>PHP and HTML</h1>
</body>
</html>