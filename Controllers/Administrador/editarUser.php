<?php
// Importamos las dependencias
    require_once("../../Models/conexionDB.php");
    require_once("../../Models/consultarUserAdmin.php");
// Este id viene  del boton elminar de la tabla 
$identificacion = $_POST['identificacion'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$rol = $_POST['rol'];
$estado = $_POST['estado'];
$fotoact = $_POST['foto_perfil'];


if(isset($_FILES['producto_foto']) && $_FILES['producto_foto']['error'] === UPLOAD_ERR_OK) {
    $nombreImagen = $_FILES['producto_foto']['name'];
    $rutaImagen = $_FILES['producto_foto']['tmp_name'];
    $rutaDestino = '../../uploads/usuarios/' . $nombreImagen;

    // Mueve la imagen cargada a la ubicación de la carpeta img/administrador
    if(move_uploaded_file($rutaImagen, $rutaDestino)) {
        $producto_foto = $nombreImagen; 
    } else {
        echo "<script>alert(Error al cargar la imagen. Se utilizará la imagen predeterminada.)</script>";
        $producto_foto = 'perfil.jpg';
        // si la imagen seleccionada no carga por alguna razon seleciona la predeterminda
    }
} else {
    echo "<script>alert(No se ha seleccionado ninguna imagen. Se utilizará la imagen predeterminada.)</script>";
    $producto_foto = $fotoact;
}

echo '<script>alert("El valor de identificación es: ' . $identificacion . ' , ' . $nombre . ', ' . $apellido . ', ' . $producto_foto . ', ' . $clave1 . ', ' . $rol . ', ' . $estado . ', , ' . $producto_foto . '");</script>';


$objConsultas = new ConsultasUSerAdmin();
$result = $objConsultas -> editaUser($identificacion, $nombre, $apellido, $email, $rol, $estado, $producto_foto);

?>