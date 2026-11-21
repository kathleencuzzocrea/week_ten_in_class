<?php 

declare(strict_types=1);

function processFormInputs(array $input){
    $result = [];
    $result['name'] = $input['name'] ?? null;
    $result['name'] = $input['name'] ?? null;
    if (array_key_exists('published', $input) && $input['published'] === 'on'){
        $result['published'] = true;
    } else {
        $result['published'] = false;
    }
    
    return $result;
}

$input = processFormInputs($_POST);

var_dump($input);
exit;