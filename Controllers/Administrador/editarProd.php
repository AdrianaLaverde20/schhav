<?php
// Importamos las dependencias
    require_once("../../Models/conexionDB.php");
    require_once("../../Models/consultarUserAdmin.php");
// Este id viene  del boton elminar de la tabla 
$producto_codigo = $_POST['producto_codigo'];
$producto_nombre = $_POST['producto_nombre'];
$producto_precio = $_POST['producto_precio'];
$producto_stock = $_POST['producto_stock'];
// creamos el objeto consiñtas

$objConsultas = new ConsultasUSerAdmin();
$result = $objConsultas -> editaProd($producto_codigo, $producto_nombre, $producto_precio, $producto_stock);

?>