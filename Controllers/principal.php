<?php

require_once 'EmailUser.php';

// Destinatario del correo electrónico y mensaje
$destinatario = $_POST['Email'];
$mensaje = 'Para Recuperar Tu Contraseña Ingresa al Siguiente Link: <a href="http://localhost/SCHHAV%20-%20Felipe/views/Extras/recupClave.php">Recuperar Contraseña</a>';

// Llama a la función para enviar el correo electrónico
if(enviarCorreo($destinatario, $mensaje)) {
    echo "<script>alert('Email enviado de recuperacion')</script>";
    echo "<script>location.href='../views/Extras/login.html'</script>";
} else {
    echo 'Message could not be sent';
}

?>