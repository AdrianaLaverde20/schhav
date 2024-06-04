<?php
// Importamos las dependencias
    require_once("../../Models/conexionDB.php");
    require_once("../../Models/consultarUserAdmin.php");
// Este id viene  del boton elminar de la tabla 
$categoria_id = $_POST['categoria_id'];
$categoria_nombre = $_POST['categoria_nombre'];
// creamos el objeto consiñtas

$objConsultas = new ConsultasUSerAdmin();
$result = $objConsultas -> editaCat($categoria_id, $categoria_nombre);

?>