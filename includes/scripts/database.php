<?php 

declare(strict_types=1);

function getConnection()
{
    $hostname = 'localhost';
    $username = 'root'; //potentially may need to use if localhost is not working
    // $password = 'root'; for mac
    $password = ''; //windows
    $database = 'digital_magazine';
    // $port = 8889; mac
    $port = 3306; //windows

    return mysqli_connect($hostname, $username, $password, $database, $port);
};