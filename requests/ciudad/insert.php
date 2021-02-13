<?php
session_start();
include "../../config/connexion.php";

$nombre = $_POST['nombre'];

$consulta = "INSERT INTO ciudad (nombre) VALUES ('$nombre')";

if (mysqli_query($connexion, $consulta)) {
    header("Location: ../../views/ciudad/lista.php");
    $_SESSION['response'] = 'success,Registro creado correctamente';
} else {
    $_SESSION['response'] = "danger," . mysqli_error($connexion);
    header('Location: ../../views/ciudad/crear.php');
}