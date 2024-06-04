<?php

// Importa las clases de PHPMailer
require '../email/PHPMailer/src/Exception.php';
require '../email/PHPMailer/src/PHPMailer.php';
require '../email/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// emailController.php

function enviarCorreo($destinatario, $mensaje) {
    // Crea una instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP de Gmail
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'senaschhav@gmail.com';
        $mail->Password   = 'rumn sshv otps kwnd';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Establece el remitente del correo electrónico
        $mail->setFrom('senaschhav@gmail.com', 'SCHHAV');

        // Agrega el destinatario
        $mail->addAddress($destinatario);

        // Establece el formato del correo electrónico como HTML
        $mail->isHTML(true);

        // Asunto y cuerpo del correo electrónico
        $mail->Subject = 'Recuperar Contraseña';
        $mail->Body    = $mensaje;

        // Envía el correo electrónico
        $mail->send();
        return true;
    } catch (Exception $e) {
        // Maneja cualquier error que ocurra durante el envío del correo electrónico
        return false;
    }
}
  
?>
