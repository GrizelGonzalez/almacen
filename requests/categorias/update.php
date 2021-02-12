<?php

session_start();
include "../../config/connexion.php";

$id = $_POST['id'];
$nombre = $_POST['nombre'];

$consulta = "UPDATE categoria SET nombre = '$nombre'  WHERE id = {$id}";

if (mysqli_query($conexion, $consulta)) {
    header("Location: ../../views/categorias/lista.php");
    $_SESSION['response'] = 'success,Registro actualizado correctamente';
} else {
    $_SESSION['response'] = "danger," . mysqli_error($conexion);
    header('Location: ../../views/categorias/editar.php?id='.$id);
}