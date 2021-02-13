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

var_dump($sucursales);
die();


$consulta = "
UPDATE producto 
    SET nombre = '$nombre',
        descripcion  = '$descripcion',
        precio = '$precio',
        stock = '$stock',
        categoria_id = '$categoria' WHERE id = {$id}   
";

$consultaHasTienda = "SELECT COUNT(*) AS hasTienda FROM producto_has_tienda WHERE producto_id = $id";
$resultadoHasTienda = mysqli_query($connexion, $consultaHasTienda);
$countTienda = mysqli_fetch_assoc($resultadoHasTienda);
$hasTienda = (int) $countTienda['hasTienda'];

$consultaProductoHasTienda = "INSERT INTO producto_has_tienda (producto_id, tienda_id) VALUES ($id, )";


if ($hasTienda > 0) {

}
die();


if (mysqli_query($connexion, $consulta)) {
    header("Location: ../../views/productos/lista.php");
    $_SESSION['response'] = 'success,Registro actualizado correctamente';
} else {
    $_SESSION['response'] = "danger," . mysqli_error($connexion);
    header('Location: ../../views/productos/editar.php?id='.$id);
}
