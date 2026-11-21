<?php 

require_once __DIR__ . '/includes/scripts/database.php';

// step 1 connect to database
$connection = getConnection();

$id = $_GET['id'] ?? null;
$id = intval($id);

if ($id == null || ! is_int($id) || $id === 0){
    // set response code
    http_response_code(404);
    // exit out with an error and print to the browser
    exit('Error! Issue not found');
    // header('Location: index.php');
}

// prepare the query with thew wildcarss
$statement = mysqli_prepare($connection, 'SELECT * FROM issues WHERE id = ?;');
// execute the query replacing the wildcards with the array of values in order
$success = mysqli_stmt_execute($statement, [$id]);
// convert the now execcuted statement into a mysqli result object so we can iterate over it
$queryResult = mysqli_stmt_get_result($statement);

// step 2 run a query against our database
$queryResult = mysqli_query($connection, 'SELECT * FROM issues WHERE id = ' . $id . ';');

// get the issue from the query
// its fine if we load everything as everything, should only be one row
$issue = mysqli_fetch_array($queryResult);

$issueId = $issue['id'];

$articleResult = mysqli_query($connection, 'SELECT * FROM articles WHERE issue_id = ' . $issueId . ';');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- don't just use the name of the record, use some context that is consitsent in the title as well -->
    <title>Issues - <?php echo $issue['name'];?></title>
</head>
<body>
    <h1><?php echo $issue['name'];?></h1>
    <main>
        <h2>Articles</h2>
        <ul>
            <?php while($article = mysqli_fetch_assoc($articleResult)) { ?>
            <li>
                <article>
                    <h3><?php echo $article['headline']; ?></h3>
                    <p><?php $article['slug'];?></p>
                </article>
            </li>
            <?php } ?>
        </ul>
    </main>
    <footer>
        <a href="index.php">Home</a>
    </footer>
</body>
</html>