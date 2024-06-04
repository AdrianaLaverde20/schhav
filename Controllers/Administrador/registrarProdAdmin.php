<?php 
session_start();
require_once("../../Models/conexionDB.php");
require_once("../../Models/consultarUser.php");
require_once("../../Models/consultarUserAdmin.php");

// aca se coje el name del sumbit del formulario

if(isset($_POST['regAdm_user'])) {
    $producto_codigo = $_POST['producto_codigo'];
    $producto_nombre = $_POST['producto_nombre'];
    $producto_tipo = $_POST['tipo_id'];
    $producto_talla = $_POST['talla_id'];
    $producto_precio = $_POST['producto_precio'];
    $producto_stock = $_POST['producto_stock'];
    $categoria_id = $_POST['categoria_id'];
    $usuario_id = $_SESSION['id'];
    $fecha = date('Y-m-D');

    // Verifica si se ha subido una imagen desde el formulario
    if(isset($_FILES['producto_foto']) && $_FILES['producto_foto']['error'] === UPLOAD_ERR_OK) {
        $nombreImagen = $_FILES['producto_foto']['name'];
        $rutaImagen = $_FILES['producto_foto']['tmp_name'];
        $rutaDestino = '../../uploads/productos/' . $nombreImagen;

        // Mueve la imagen cargada a la ubicación de la carpeta img/administrador
        if(move_uploaded_file($rutaImagen, $rutaDestino)) {
            $producto_foto = $nombreImagen; 
        } else {
            echo "<script>alert(Error al cargar la imagen. Se utilizará la imagen predeterminada.)</script>";
            $producto_foto = 'producto.jpg';
            // si la imagen seleccionada no carga por alguna razon seleciona la predeterminda
        }
    } else {
        echo "<script>alert(No se ha seleccionado ninguna imagen. Se utilizará la imagen predeterminada.)</script>";
        $producto_foto = 'producto.jpg';
    }
        $objconsultas = new ConsultasUserAdmin();
        $result = $objconsultas->registrarProdAdmin($producto_codigo,$producto_talla,$producto_tipo, $producto_nombre, $producto_precio, $producto_stock, $categoria_id, $usuario_id, $producto_foto, $fecha);
} else {
    echo "<script>alert(No se ha seleccionado ninguna imagen. Se utilizará la imagen predeterminada.)</script>";
    echo "<script>location.href='../../views/Administrador/consultarProd.php'</script>";
}
?>
