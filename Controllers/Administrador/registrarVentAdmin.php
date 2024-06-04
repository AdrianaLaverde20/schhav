<?php 
session_start();
require_once("../../Models/conexionDB.php");
require_once("../../Models/consultarUser.php");
require_once("../../Models/consultarUserAdmin.php");

// aca se coje el name del sumbit del formulario

    $prod_id = $_POST['producto'];
    $stock = $_POST['stock'];
    $total = $_POST['total'];
    


        $objconsultas = new ConsultasUserAdmin();
        $result = $objconsultas->registrarVentAdmin($prod_id, $stock, $total);
?>
