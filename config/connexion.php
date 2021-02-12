<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "almacenes";

$conexion = mysqli_connect($host,$user,$pass,$db);
mysqli_set_charset($conexion,'utf8');

?>