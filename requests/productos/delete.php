<?php
session_start();
include "../../conexion/configuration.php";

$id = $_GET['id'];
$delete = "DELETE FROM producto where id = '$id'";

if (mysqli_query($conexion, $delete)) {
    header("Location: ../../views/productos/lista.php");
    $_SESSION['response'] = 'success,Registro eliminado correctamente';
} else {
    header("Location: ../../views/productos/lista.php");
    $_SESSION['response'] = "danger," . mysqli_error($conexion);
}
