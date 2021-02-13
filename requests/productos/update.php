<?php
session_start();
include "../../config/connexion.php";
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$categoria = $_POST['categoria'];
$sucursales = $_POST['sucursales'];


$consulta = "UPDATE producto SET nombre = '$nombre',descripcion  = '$descripcion',precio = '$precio',stock = '$stock',categoria_id = '$categoria' 
            WHERE id = {$id}";

$consultaDelete = "DELETE FROM producto_has_tienda WHERE producto_id = $id";


if (mysqli_query($connexion, $consulta) && mysqli_query($connexion, $consultaDelete)) {
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
