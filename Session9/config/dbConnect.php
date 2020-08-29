<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'lms';

try {
    $connection = new PDO("mysql:dbhost=$servername;dbname=$database", $username, $password);
    echo "Connection works";
} catch (PDOException $e) {
    file_put_contents('errors.log', $e->getMessage() . "\n", FILE_APPEND);
}