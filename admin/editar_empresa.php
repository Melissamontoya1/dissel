<?php

include ('includes/connection.php');

$id_empresa=$_POST['id_empresa'];
$nombre_empresa=$_POST['nombre_empresa'];
$direccion_empresa=$_POST['direccion_empresa'];
$telefono_empresa=$_POST['telefono_empresa'];
$correo_empresa=$_POST['correo_empresa'];


	$updateEmpresa = "UPDATE empresa SET nombre_empresa = '{$nombre_empresa}', direccion_empresa = '{$direccion_empresa}', telefono_empresa = '{$telefono_empresa}', correo_empresa = '{$correo_empresa}' WHERE id_empresa = '{$id_empresa}'";

	if ($sqlconnection->query($updateEmpresa) === TRUE) {
		echo '1';

	} 

	else {
        	//handle
		echo '2';
		echo $sqlconnection->error;
		echo $updateEmpresa;
	}


?>