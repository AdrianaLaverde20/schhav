<?php 
session_start();
require_once("../../Models/conexionDB.php");
require_once("../../Models/consultarUser.php");
require_once("../../Models/consultarUserAdmin.php");

// aca se coje el name del sumbit del formulario

if(isset($_POST['regAdm_user'])) {
    $identificacion = $_POST['identificacion'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $clave = $_POST['identificacion'];
    $claveb = $clave;
    $rol = $_POST['rol'];
    $estado = $_POST['estado'];
    $fecha_actual = date("Y-m-d");

    // Verifica si se ha subido una imagen desde el formulario
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
        $producto_foto = 'perfil.jpg';
    }

    if($clave == $claveb){
        $clavemd = md5($clave);
        
        $objconsultas = new ConsultasUserAdmin();
        $result = $objconsultas->registrarUserAdmin($identificacion, $nombre, $apellido, $email, $clavemd, $rol, $estado, $fecha_actual, $producto_foto);
    } else {
        echo "<script>alert('No coinciden las contraseñas o claves o el usuario no se la verdad')</script>";
    }
} else {
    echo "<script>alert(No se ha seleccionado ninguna imagen. Se utilizará la imagen predeterminada.)</script>";
    echo "<script>location.href='../../views/Administradorhome.php?views=Registrar-usuario'</script>";
}
?>
