<?php 
session_start();
require_once("../../Models/conexionDB.php");
require_once("../../Models/consultarUser.php");
require_once("../../Models/consultarUserVendedor.php");

// aca se coje el name del sumbit del formulario

    $categoria_codigo = $_POST['categoria_codigo'];
    $categoria_nombre = $_POST['categoria_nombre'];
    $usuario_id = $_SESSION['id'];
    $fecha = date('Y-m-s');


        $objconsultas = new ConsultasUserVend();
        $result = $objconsultas->registrarCatVend($categoria_codigo, $categoria_nombre, $usuario_id, $fecha);
?>
