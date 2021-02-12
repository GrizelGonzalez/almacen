<?php
session_start();
include "../../config/connexion.php";
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$categoria = $_POST['categoria'];


$consulta = "UPDATE producto SET nombre = '$nombre',
                                   descripcion  = '$descripcion',
                                   precio = '$precio',
                                   stock = '$stock',
                                   categoria_id = '$categoria'  WHERE id = {$id}";

if (mysqli_query($conexion, $consulta)) {
    header("Location: ../../views/productos/lista.php");
    $_SESSION['response'] = 'success,Registro actualizado correctamente';
} else {
    $_SESSION['response'] = "danger," . mysqli_error($conexion);
    header('Location: ../../views/productos/editar.php?id='.$id);
}
