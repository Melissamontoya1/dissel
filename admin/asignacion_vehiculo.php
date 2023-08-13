<?php
include('includes/adminheader.php');
include('includes/adminnav.php');
if (isset($_POST['asigar_vehiculo'])) {
	$id_usuario_fk = $_POST['id_usuario_fk'];
	$id_vehiculo_fk = $_POST['id_vehiculo_fk'];
	$fecha_asignacion = $_POST['fecha_asignacion'];
	$estado_asignacion = "Activo";
	$estado = "Habilitado";
	$query = "INSERT INTO asignacion_vehiculo(fecha_asignacion, id_vehiculo_fk, id_usuario_fk, estado_asignacion) VALUES ('$fecha_asignacion','$id_vehiculo_fk' , '$id_usuario_fk', '$estado_asignacion' )";
	if ($sqlconnection->query($query) === TRUE) {
		$updateItemQuery = "UPDATE vehiculo SET  estado='{$estado}' WHERE id_vehiculo = '{$id_vehiculo_fk}' ";
		if ($sqlconnection->query($updateItemQuery) === TRUE) {
			echo '<script>
			swal("Buen Trabajo!", "Se asigno el vehiculo con éxito", "success").then(function() {
				window.location.replace("asignacion_vehiculo.php");
				});
				</script>
				';
		} else {
			echo "Error al guardar los datos";
			echo $sqlconnection->error;
			echo $updateItemQuery;
		}
	} else {
		echo "<script>swal('Ocurrio un error, inténtalo nuevamente');</script>";
	}
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Page Heading -->
			<div class="row">
				<div class="card card-primary col-xs-12 col-sm-12 col-md-12">
					<div class="card-header">
						<h3 class="card-title">Asignar Vehiculo</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form role="form" action="" method="POST" enctype="multipart/form-data">
						<div class="card-body row">
							<div class="form-group col-md-4 col-sm-12 col-xs-12">
								<label for="user_title">Fecha Asignacion</label>
								<input type="date" name="fecha_asignacion" class="form-control" required>
							</div>
							<div class="form-group col-md-4 col-sm-12 col-xs-12">
								<label for="inputEmail4">Seleccione el Vehiculo</label>
								<select class="form-control input-sm " name="id_vehiculo_fk">
									<?php
									$sql_vendedor = mysqli_query($sqlconnection, "SELECT * FROM vehiculo WHERE estado='Habilitado' order by ciudad");
									while ($rw = mysqli_fetch_array($sql_vendedor)) {
										$id_vehiculo = $rw["id_vehiculo"];
										$placa = $rw["placa"];
										$color = $rw["color"];
										$ciudad = $rw["ciudad"];
									?>
										<option value="<?php echo $id_vehiculo ?>" name="id_vehiculo_fk"><?php echo $placa . " - " . $color . " - " . $ciudad; ?></option>
									<?php
									}
									?>
								</select>
							</div>
							<div class="form-group col-md-4 col-sm-12 col-xs-12">
								<label for="inputEmail4">Seleccione el Técnico</label>
								<input list="browsers" name="id_usuario_fk" class="form-control" /></label>
								<datalist id="browsers">
									<?php
									$sql_tecnico = mysqli_query($sqlconnection, "SELECT * FROM users");
									while ($rw = mysqli_fetch_array($sql_tecnico)) {
										$id = $rw["id"];
										$identificacion = $rw["identificacion"];
										$nombre = $rw["firstname"];
										$ciudad = $rw["ciudad"];
									?>
										<option value="<?php echo $id ?>" name="id_vehiculo_fk"><?php echo $identificacion . " - " . $nombre; ?></option>
									<?php
									}
									?>
								</datalist>
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<button type="submit" name="asigar_vehiculo" class="btn bg-teal btn-block" value="Add User"><i class="fas fa-2x fa-save"></i>&nbsp; &nbsp;&nbsp;Guardar Usuario</button>
						</div>
					</form>
				</div>
			</div>
	</section>
</div>
<?php
include('includes/adminfooter.php');
?>