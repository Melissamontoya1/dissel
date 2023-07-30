<?php

require 'mail/autoload.php';
require ('includes/configmail.php');

	$mail->setFrom('dissel@aylriesgosyseguros.com', 'Alarmas Dissel');

$empresas = "SELECT * FROM users WHERE role='superadmin'";

if ($result = $sqlconnection->query($empresas)) {

    if ($result->num_rows > 0) {

        while($rempresa = $result->fetch_array(MYSQLI_ASSOC)) {
            $correo_usuario=$rempresa['email'];
			$mail->addAddress($correo_usuario, );
		}
	}
	
    //$mail->addCC('yumemogu@gmail.com');
    if ($archivo_correo=="") {
    	
    }else{
    	$mail->addAttachment('archivos_correo/'.$archivo_correo, $archivo_correo);
    }

	

	$mail->isHTML(true);
	$mail->Subject =  $titulo_correo;
	$mail->Body =  $mensaje_correo;
	$mail->send();

	echo 'Correo enviado';
	echo "<script> 
	window.location.href='./correo_enviado.php'; </script>";

}else{  echo $sqlconnection->error;
        echo "ERROR al enviar el correo";
    }
?>