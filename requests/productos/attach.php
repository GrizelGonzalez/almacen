<?php
session_start();
include "../../config/connexion.php";

$id = $_POST['id'];
$sucursales = $_POST['sucursales'];
$consulta = "DELETE FROM producto_has_tienda WHERE producto_id = $id";

if (mysqli_query($connexion, $consulta)) {
    if (count($sucursales) != 0) {
        for ($i = 0; $i <= count($sucursales); $i++) {
            mysqli_query($connexion, "INSERT INTO producto_has_tienda (producto_id, tienda_id) VALUES ($id, $sucursales[$i])");
        }
    }
    header("Location: ../../views/productos/lista.php");
    $_SESSION['response'] = 'success,Registro actualizado correctamente';
} else {
    $_SESSION['response'] = "danger," . mysqli_error($connexion);
    header('Location: ../../views/productos/editar.php?id=' . $id);
}
