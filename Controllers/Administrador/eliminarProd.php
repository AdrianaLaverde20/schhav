<?php
// Importamos las dependencias
    require_once("../../Models/conexionDB.php");
    require_once("../../Models/consultarUserAdmin.php");
// Este id viene  del boton elminar de la tabla 
    $id_prod = $_GET['producto_codigo'];
// creamos el objeto consiñtas

$objConsultas = new ConsultasUserAdmin();
$result = $objConsultas -> eliminarProd($id_prod);

?>