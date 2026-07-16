<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Cargar autoload de Composer
require_once __DIR__ . '/../vendor/autoload.php';

// CONFIGURACIÓN SMTP - MODIFICA ESTOS VALORES

$mail_config = [
    'smtp_host' => 'smtp.gmail.com',
    'smtp_port' => 587,

    // Cuenta de correo que ENVÍA los mensajes
    'smtp_user' => 'correo_que_envia@gmail.com', // Email real para autenticarse
    'smtp_password' => 'TU_CONTRASEÑA_DE_APLICACION', // Contraseña de aplicación de Google

    // Remitente visible (Lo que se ve en la bandeja de entrada)
    'from_email' => 'correo_que_envia@gmail.com', // Suele ser el mismo que smtp_user para evitar SPAM
    'from_name' => 'COCEMFE Ceuta - Web',     // Nombre de la entidad que envía el correo

    // Destinatario (A quién le van a llegar los formularios completados)
    'to_email' => 'correo_que_recibe@cocemfeceuta.es',
    'to_name' => 'Administración COCEMFE Ceuta',
];

/**
 * Envía un correo electrónico usando PHPMailer con la configuración SMTP.
 *
 * @param string      $asunto     Asunto del correo
 * @param string      $cuerpoHTML Cuerpo del correo en HTML
 * @param string|null $adjuntoPath Ruta al archivo adjunto
 * @param string|null $adjuntoNombre Nombre original del archivo adjunto
 * @return array 
 */
function enviarCorreo($asunto, $cuerpoHTML, $adjuntoPath = null, $adjuntoNombre = null, $replyToEmail = null, $replyToName = null)
{
    global $mail_config;

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = $mail_config['smtp_host'];
        $mail->SMTPAuth = true;
        $mail->Username = $mail_config['smtp_user'];
        $mail->Password = $mail_config['smtp_password'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = $mail_config['smtp_port'];
        $mail->CharSet = 'UTF-8';

        // Remitente (Nombre dinámico si se proporciona, sino el por defecto)
        $nombreRemitente = $replyToName ? $replyToName . ' (Form COCEMFE)' : $mail_config['from_name'];
        $mail->setFrom($mail_config['from_email'], $nombreRemitente);
        $mail->addAddress($mail_config['to_email'], $mail_config['to_name']);

        // Reply-To para poder responder directamente al usuario
        if (!empty($replyToEmail)) {
            $mail->addReplyTo($replyToEmail, $replyToName ?? '');
        }

        // Contenido del email
        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body = $cuerpoHTML;
        // Versión texto plano como fallback
        $mail->AltBody = strip_tags(str_replace(['<br>', '<br/>', '<br />', '</tr>', '</p>'], "\n", $cuerpoHTML));

        // Adjunto opcional (para CV en formulario de empleo)
        if ($adjuntoPath && file_exists($adjuntoPath)) {
            $mail->addAttachment($adjuntoPath, $adjuntoNombre ?? basename($adjuntoPath));
        }

        $mail->send();

        return [
            'ok' => true,
            'mensaje' => 'Correo enviado correctamente.'
        ];

    } catch (Exception $e) {
        return [
            'ok' => false,
            'mensaje' => 'Error al enviar el correo: ' . $mail->ErrorInfo
        ];
    }
}
