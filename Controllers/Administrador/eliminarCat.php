<?php
// Importamos las dependencias
    require_once("../../Models/conexionDB.php");
    require_once("../../Models/consultarUserAdmin.php");
// Este id viene  del boton elminar de la tabla 
    $id_cat = $_GET['categoria_id'];
// creamos el objeto consiñtas

$objConsultas = new ConsultasUserAdmin();
$result = $objConsultas -> eliminarCat($id_cat);

?>