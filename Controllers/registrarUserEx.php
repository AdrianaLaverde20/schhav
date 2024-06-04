


<?php 
session_start();
require_once("../Models/conexionDB.php");
require_once("../Models/consultarUser.php");

if(isset($_POST['reg_user'])) {
    $identificacion = $_POST['identificacion'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $clave = $_POST['clave'];
    $claveb = $_POST['claveb'];
    $rol = 'Cliente';
    $estado = 'Pendiente';
    $fecha_actual = date("Y-m-d");

    // Verifica si se ha subido una imagen
    if(isset($_FILES['producto_foto']) && $_FILES['producto_foto']['error'] === UPLOAD_ERR_OK) {
        $nombreImagen = $_FILES['producto_foto']['name'];
        $rutaImagen = $_FILES['producto_foto']['tmp_name'];
        $rutaDestino = '../views/Extras/img/usuarios/' . $nombreImagen;

        // Mueve la imagen cargada a la ubicación deseada
        if(move_uploaded_file($rutaImagen, $rutaDestino)) {
            $producto_foto = $nombreImagen; // Se utiliza la imagen cargada
        } else {
            echo "Error al cargar la imagen. Se utilizará la imagen predeterminada.";
            $producto_foto = 'perfil.jpg'; // Si hay un error al cargar la imagen, se utiliza la imagen predeterminada
        }
    } else {
        echo "No se ha seleccionado ninguna imagen. Se utilizará la imagen predeterminada.";
        $producto_foto = 'perfil.jpg'; // Si no se selecciona ninguna imagen, se utiliza la imagen predeterminada
    }

    if($clave == $claveb){
        $clavemd = md5($clave);
        $objconsultas = new ConsultasUser();
        $result = $objconsultas->registrarUserEx($identificacion, $nombre, $apellido, $email, $clavemd, $rol, $estado, $fecha_actual, $producto_foto);
    } else {
        echo "<script>alert('No coinciden las contraseñas o claves o el usuario no se la verdad')</script>";
        echo "<script>location.href='../views/Extras/Administrador/home.html'</script>";
    }
} else {
    echo "No se ha enviado ningún formulario.";
}
?>
