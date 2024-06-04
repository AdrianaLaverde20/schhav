<?php
// Importamos las dependencias
    require_once("../../Models/conexionDB.php");
    require_once("../../Models/consultarUserAdmin.php");
// Este id viene  del boton elminar de la tabla 
    $id_user = $_GET['identificacion'];
// creamos el objeto consiñtas

$objConsultas = new ConsultasUserAdmin();
$result = $objConsultas -> eliminarUser($id_user);

?>