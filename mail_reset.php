<?php
include('admin/includes/connection.php');
$email = $_POST['email'];
require 'admin/mail/autoload.php';
require('admin/includes/configmail.php');
$mail->setFrom('dissel@aylriesgosyseguros.com', 'Seguridad Dissel');
$mail->addAddress($email);
$mail->isHTML(true);
$codigo = rand(1000, 9999);
$query = "SELECT * FROM users where email = '$email' ";
$result = $sqlconnection->query($query);
$row = $result->fetch_assoc();

if ($result->num_rows > 0) {
    $titulo_correo = "RESTABLECER CONTRASEÑA PLATAFORMA DE DISSEL";
    $message  = "<html><body>";
    $message .= '
    <h1>Seguridad Dissel</h1>
    <div style="text-align:center; background-color:#ccc">
        <p>Restablecer contraseña</p>
        <h3>' . $codigo . '</h3>
        <p> <a 
            href="http://localhost/Dissel/verificar.php?email=' . $email . '&token=' . $token . '"> 
            para restablecer da click aqui </a> </p>
        <p> <small>Si usted no envio este codigo favor de omitir</small> </p>
    </div>
';
    //CIERRE FINAL 
    $message .= "</body></html>";
    $mail->isHTML(true);
    $mail->Subject =  $titulo_correo;
    $mail->Body =  $message;
    $mail->send();
    echo 'Correo enviado';
    $enviado = true;
    echo "<script> 
    window.location.href='./index.php'; </script>";
} else {
    header("Location: ../index.php?message=not_found");
}
?>