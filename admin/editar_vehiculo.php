<?php
include ('includes/connection.php');
$id_vehiculo=$_POST['id_vehiculo'];
$placa=$_POST['placa'];
$color=$_POST['color'];
$marca=$_POST['marca'];
$motor=$_POST['motor'];
$modelo=$_POST['modelo'];
$soat=$_POST['soat'];
$tecnomecanica=$_POST['tecnomecanica'];
	$updateVehiculo = "UPDATE vehiculo SET placa = '{$placa}', color = '{$color}', marca = '{$marca}', motor = '{$motor}', modelo = '{$modelo}', soat = '{$soat}', tecnomecanica = '{$tecnomecanica}'  WHERE id_vehiculo = '".$id_vehiculo."'";
	if ($sqlconnection->query($updateVehiculo) === TRUE) {
		echo "Se edito";
	}else{
		echo "someting wong";
		echo $sqlconnection->error;
		echo $updateVehiculo;
	}
?>