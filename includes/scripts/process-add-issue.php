<?php 

declare(strict_types=1);
require_once __DIR__ . '/database.php';

function processFormInputs(array $input){
    $result = [];
    $result['name'] = $input['name'] ?? null;
    $result['date'] = $input['date'] ?? null;
    if (array_key_exists('published', $input) && $input['published'] === 'on'){
        $result['published'] = true;
    } else {
        $result['published'] = false;
    }
    
    return $result;
}

function createNewIssue(
    string $name, 
    string $date, 
    bool $published
    ): bool {
        $connection =  getConnection();

        $query = 'INSERT INTO issues (name, date, published) VALUE (?, ?, ?);';
        $bindings = [$name, $date, $published];
        $statement = mysqli_prepare($connection, $query);
        $success = mysqli_stmt_execute($statement, $bindings);

        return $success;
}

$input = processFormInputs($_POST);

$success = createNewIssue($input['name'], $input['date'], $input['published']);

header('Location: /week_ten_in_class/add-issue.php');

var_dump($input);
exit;