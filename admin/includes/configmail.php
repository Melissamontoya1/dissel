<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->isSMTP();
//HOST DEL CORREO ELECTRONICO
$mail->Host = 'smtp.hostinger.com';
$mail->SMTPAuth = true;
//DIRECCION CORREO ELECTRONICO
$mail->Username = 'dissel@aylriesgosyseguros.com';
//CONTRASEÑA DEL CORREO ELECTRONICO
$mail->Password = 'Dissel@2023';
//INDIQUE PROTOCOLO SSL - TLS
$mail->SMTPSecure = 'ssl';
//PUERTO 
$mail->Port = 465;
$mail->CharSet = 'UTF-8';
?>