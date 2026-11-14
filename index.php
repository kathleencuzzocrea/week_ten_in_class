<?php 

require_once __DIR__ . '/includes/scripts/database.php';

// step 1 connect to database
$connection = getConnection();

// step 2 run a query against our database
$queryResult = mysqli_query($connection, 'SELECT * FROM issues;');

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
		<ul>
			<!-- loop over each result from our query -->
			<!-- the reason we use mysli fetch array is because this loads the next record every time we call it -->
			<?php while ($result = mysqli_fetch_array($queryResult)): ?>
			<li>
				<article>
					<!-- and print the name -->
					<h3><?php echo $result['name'];?></h3>
				</article>
			</li>
			<?php endwhile; ?>
		</ul>
	</main>
</body>
</html>