<?php
session_start();
include "../../config/connexion.php";
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$categoria = $_POST['categoria'];

$consulta = "INSERT INTO  producto (nombre,descripcion, precio, stock, categoria_id) VALUES ('$nombre', '$descripcion', $precio,$stock,$categoria)";

if (mysqli_query($conexion, $consulta)) {
    header("Location: ../../views/productos/lista.php");
    $_SESSION['response'] = 'success,Registro creado correctamente';
} else {
    $_SESSION['response'] = "danger," . mysqli_error($conexion);
    header('Location: ../../views/productos/crear.php');
}
