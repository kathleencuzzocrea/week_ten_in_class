<?php 

require_once __DIR__ . '/includes/scripts/database.php';

$search = $_GET['search'] ?? null;

// step 1 connect to database
$connection = getConnection();

$queryResult = mysqli_query($connection, 'SELECT * FROM issues;');
$query = 'SELECT * FROM issues';
if (! $search) {
	$queryResult = mysqli_query($connection, 'SELECT * FROM issues;');
} else if ($search) {
	// bad example of how to insert the search into our query 
	// $query = 'SELECT * FROM issues WHERE name LIKE ?;';

	$sanitizedInput = htmlspecialchars($search); //helo & world --> hello &amp; world 

	$statement = mysqli_prepare($connection, 'SELECT * FROM issues WHERE name LIKE ?;');
	// the array that we pass in as the second argument is merged into the above statement in the same order the question marks appear
	$wildcardSearch = '%' . $search . '%'; 
	$success = mysqli_stmt_execute($statement, [$wildcardSearch]);
	// select * from issues where name like '%search%';
	$queryResult = mysqli_stmt_get_result($statement);
} 

// // step 2 run a query against our database
// $queryResult = mysqli_query($connection, 'SELECT * FROM issues;');

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
	<main>
		<h2>Issues</h2>

		<form action="index.php">
			<label for="search">Search</label>
			<input name="search" 
				   id="search" 
				   type="text" 
				   placeholder="Search for an issue" 
				   value="<?php echo $search ?>"
			>
			<button type="submit">Go</button>
		</form>

		<ul>
			<!-- loop over each result from our query -->
			<!-- the reason we use mysli fetch array is because this loads the next record every time we call it -->
			<?php while ($issue = mysqli_fetch_array($queryResult)): ?>
			<li>
				<article>
					<!-- and print the name -->
					<h3>
						<a href="issue.php?id=<?php echo $issue['id'];?>">
						<?php echo $issue['name'];?>
						</a>
					</h3>
				</article>
			</li>
			<?php endwhile; ?>
		</ul>
	</main>
</body>
</html>