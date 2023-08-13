<?php
include('admin/includes/connection.php');
require 'admin/mail/autoload.php';
require ('admin/includes/configmail.php');
$mail->setFrom('dissel@aylriesgosyseguros.com', 'Seguridad Dissel');
    //$mail->addAddress($email);
$empresas = "SELECT * FROM users WHERE role ='superadmin'";

if ($result = $sqlconnection->query($empresas)) {

    if ($result->num_rows > 0) {
      while($fila = $result->fetch_array(MYSQLI_ASSOC)) {
        $correo_usuario=$fila['email'];
        $mail->addAddress($correo_usuario, );
    }

// Obtener la fecha actual
    $fechaActual = date('Y-m-d');
// Consulta para traer a todos los vehiculos con vencimiento de soat o tecno
    $titulo_correo="Soat y Tecnomecanica Dissel- $fechaActual";
    $message  = "<html><body>";

    $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";

    $message .= "<tr><td>";

    $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";

    $message .= "<thead>
    <tr height='80'>
    <th colspan='5' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;' >Soat - Tecnomecanica Proximos a Vencer</th>
    </tr>
    </thead>";

    $message .= "<tbody>
    <tr>
    <td colspan='4' style='padding:15px;'>
    <p style='font-size:20px;color:black;'>Hola <B>Seguridad Dissel</B>, a continuacion encontraras los Soat y Tecnomecanica proximos a vencer</p>

    </td>
    </tr>
    <tr height='100'>
    <th colspan='5' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:24px;' >Detalles</th>
    </tr>


    <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;font-size:20px;color:white;'>
    <td style='background-color:#00a2d1; text-align:center;'>Placa </td>
    <td style='background-color:#00a2d1; text-align:center;'>Color</td>
    <td style='background-color:#00a2d1; text-align:center;'>Ciudad</td>
    <td style='background-color:#00a2d1; text-align:center;'>Soat</td>
    <td style='background-color:#00a2d1; text-align:center;'>Tecno</td>

    </tr>
    ";

    $vehi = "SELECT * FROM vehiculo";

    if ($result2 = $sqlconnection->query($vehi)) {

        if ($result2->num_rows > 0) {
          while($rw = $result2->fetch_array(MYSQLI_ASSOC)) {
            $soat=$rw["soat"];
            $tecnomecanica=$rw["tecnomecanica"];
            $placa=$rw["placa"];
            $color=$rw["color"];
            $ciudad=$rw["ciudad"];
            $fechaActual2 = date('Y-m-d');
    // Calcular la fecha objetivo 15 días antes
            $fechaSoat = date("d-m-Y",strtotime($soat."- 15 days")); 
    // Calcular la fecha objetivo 15 días antes
            $fechaTecnomecanica =date("d-m-Y",strtotime($tecnomecanica."- 15 days")); 
// Verificar si es el momento de enviar el correo
            if ($fechaActual2 <= $fechaSoat || $fechaActual2 <= $fechaTecnomecanica ) {
                $message .= "<tr  align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;font-size:15px;color:black;'>
                <td>".$placa."</td>
                <td>".$color."</td>
                <td>".$ciudad."</td>
                <td>".$soat."</td>
                <td>".$tecnomecanica."</td></tr>";

            }
        }


        
    }
}
}


$message .= "</tbody>";

$message .= "</table>";

  //CIERRE FINAL 
$message .= "</body></html>";
$mail->isHTML(true);
$mail->Subject =  $titulo_correo;
$mail->Body =  $message;
$mail->send();

echo 'Correo enviado';
$query = "INSERT INTO vencimiento(fecha_vencimiento) VALUES ('$fechaActual')";
if ($sqlconnection->query($query) === TRUE) {
     echo "<script> 
     window.location.href='index.php'; </script>";

 }else {              //handle
    echo "Error al guardar los datos";
    echo $sqlconnection->error;
    
}



}else{  echo $sqlconnection->error;
    echo "ERROR al enviar el correo";
}

?>
