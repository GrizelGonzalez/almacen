<?php
require ('env.php');

$host = getenv('DATABASE_HOST');
$db = getenv('DATABASE_NAME');
$user = getenv('DATABASE_USERNAME');
$pass = getenv('DATABASE_PASSWORD');

$conexion = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($conexion, 'utf8');

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
} 
