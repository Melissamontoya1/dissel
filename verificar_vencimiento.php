<?php 
include('admin/includes/connection.php');
$fechaActual = date('Y-m-d');
$verificar = "SELECT * FROM vencimiento WHERE fecha_vencimiento ='{$fechaActual}'";

if ($result = $sqlconnection->query($verificar)) {

	if ($result->num_rows == 0) {
		
		echo "<script> 
     window.location.href='vencimiento.php'; </script>";
}
}
	?>