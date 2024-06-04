<?php 
// session_start();
require_once("../../Models/conexionDB.php");
require_once("../../Models/consultarUser.php");
require_once("../../Models/consultarUserAdmin.php");

if(isset($_POST['regAdm_user'])) {
    
    $identificacion = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email1 = $_POST['email1'];
    $email2 = $_POST['email2'];
    $emailact = $_POST['email'];
    $clave1 = $_POST['clave1'];
    $clave2 = $_POST['clave2'];
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

        // echo '<script>alert("El valor de identificación es: ' . $identificacion . ' , ' . $nombre . ', ' . $apellido . ', ' . $emailact . ', ' . $clave1 . ', ' . $rol . ', ' . $estado . ', , ' . $producto_foto . '");</script>';

        // EL CODIGO DE ARRIBA ES PARA VERIFICAR SI SE ESTAN PASANDO LOS VALORES DE LAS VRIABLES 

    } else {
        echo "<script>alert(No se ha seleccionado ninguna imagen. Se utilizará la imagen predeterminada.)</script>";
        $producto_foto = $fotoact;
    }

    if($clave1 == $clave2) {
        $clavemd = md5($clave1);

        if (!empty($email1) && !empty($email2)) {
            if ($email1 == $email2) {
                $email = $email1;
            } else {
                echo "<script>alert('Los emails no coinciden. Por favor, verifica e intenta de nuevo pato.');</script>";
                echo "<script>window.location.href = '../../Views/Administrador/consultarPerfil.php?identificacion=$identificacion';</script>";
                exit(); 
            }
        } else {
            $email = $emailact;
        }
        if (!empty($foto)) {
            $foto = $fotoact;
        }else{
            $fotoact = $producto_foto;
        }
        
        
        $objconsultas = new ConsultasUserAdmin();
        $result = $objconsultas->editaUserConf($identificacion, $nombre, $apellido, $email, $clavemd, $rol, $estado, $fotoact);
        
    } else {
        echo "<script>alert('Las contraseñas no coinciden.')</script>";
        echo "<script> location.href='../../Views/Administrador/consultarPerfil.php?identificacion=$identificacion'</script>";
    }
} else {
    echo "<script>alert('No se ha enviado el formulario correctamente.')</script>";
}
?>
