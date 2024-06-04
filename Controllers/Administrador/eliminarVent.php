<?php
// Importamos las dependencias
    require_once("../../Models/conexionDB.php");
    require_once("../../Models/consultarUserAdmin.php");
// Este id viene  del boton elminar de la tabla 
    $venta_id = $_GET['venta_id'];
// creamos el objeto consiñtas

$objConsultas = new ConsultasUserAdmin();
$result = $objConsultas -> eliminarVent($venta_id);

?>