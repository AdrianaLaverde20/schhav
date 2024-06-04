<?php
// Importamos las dependencias
    require_once("../../Models/conexionDB.php");
    require_once("../../Models/consultarUserVendedor.php");
// Este id viene  del boton elminar de la tabla 
    $venta_id = $_GET['venta_id'];
// creamos el objeto consiñtas

$objConsultas = new ConsultasUserVend();
$result = $objConsultas -> eliminarVent($venta_id);

?>