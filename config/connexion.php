<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "almacenes";

$conexion = mysqli_connect($host,$user,$pass,$db);
mysqli_set_charset($conexion,'utf8');

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
