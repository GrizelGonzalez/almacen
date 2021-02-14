<?php
session_start();
include "../../config/connexion.php";

$id = $_GET['id'];
$consulta = "DELETE FROM categoria where id = '$id'";

if (mysqli_query($connexion, $consulta)) {
    header("Location: ../../views/categorias/lista.php");
    $_SESSION['response'] = 'success,Registro eliminado correctamente';
} else {
    header("Location: ../../views/categorias/lista.php");
    $_SESSION['response'] = "danger," . mysqli_error($connexion);
}