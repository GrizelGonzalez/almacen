<?php
session_start();
include "../../conexion/configuration.php";

$nombre = $_POST['nombre'];

$consulta = "INSERT INTO categoria (nombre) VALUES ('$nombre')";

if (mysqli_query($conexion, $consulta)) {
    header("Location: ../../views/categorias/lista.php");
    $_SESSION['response'] = 'success,Registro creado correctamente';
} else {
    $_SESSION['response'] = "danger," . mysqli_error($conexion);
    header('Location: ../../views/categorias/crear.php');
}
