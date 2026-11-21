
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit issue</title>
</head>
<body>
    <h1>Add an existing issue</h1>
    <main>
        <form action="includes/scripts/process-add-issue.php" method="POST">
            <div>
                <label for="name">Issue Name:</label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <label for="date">Issue Date:</label>
                <input type="date" name="date" id="date">
            </div>
            <div>
                <label for="published">Issue is published?</label>
                <input type="checkbox" name="published" id="published">
            </div>
            <div>
                <button type="submit">Save</button>
            </div>

        </form>
    </main>
</body>
</html>