<?php
require ('env.php');

$hostname = getenv('DATABASE_HOST');
$database = getenv('DATABASE_NAME');
$username = getenv('DATABASE_USERNAME');
$password = getenv('DATABASE_PASSWORD');

$connexion = mysqli_connect($hostname, $username, $password, $database);
mysqli_set_charset($connexion, 'utf8');

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
} 
