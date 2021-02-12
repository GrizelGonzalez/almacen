<?php

session_start();
include "../../config/connexion.php";

$id = $_POST['id'];
$nombre = $_POST['nombre'];

$consulta = "UPDATE ciudad SET nombre = '$nombre'  WHERE id = {$id}";

if (mysqli_query($conexion, $consulta)) {
    header("Location: ../../views/ciudad/lista.php");
    $_SESSION['response'] = 'success,Registro actualizado correctamente';
} else {
    $_SESSION['response'] = "danger," . mysqli_error($conexion);
    header('Location: ../../views/ciudad/editar.php?id='.$id);
}