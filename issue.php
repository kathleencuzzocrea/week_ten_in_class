<?php 

require_once __DIR__ . '/includes/scripts/database.php';

// step 1 connect to database
$connection = getConnection();

$id = 1;
// step 2 run a query against our database
$queryResult = mysqli_query($connection, 'SELECT * FROM issues WHERE id = ' . $id . ';');

// get the issue from the query
// its fine if we load everything as everything, should only be one row
$issue = mysqli_fetch_array($queryResult, MYSQLI_ASSOC);
var_dump($issue);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>