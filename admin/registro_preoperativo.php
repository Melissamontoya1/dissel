<?php
include('includes/adminheader.php');
include('includes/adminnav.php');
if (isset($_SESSION['role'])) {
	$currentrole = $_SESSION['role'];
}
if ($currentrole == 'superasmin') {
	echo "<script> alert('Solo los Tecnicos pueden realizar registros preoperativos');
	window.location.href='./index.php'; </script>";
} else {
	if (isset($_POST['add'])) {
			$img = $_POST['base64'];
			$img = str_replace('data:image/png;base64,', '', $img);
			$fileData = base64_decode($img);
			$fileName = uniqid() . '.png';
			file_put_contents("./firmas/" . $fileName, $fileData);
			$baja = $_POST['baja'];
			$alta = $_POST['alta'];
			$stop = $_POST['stop'];
			$direccionales = $_POST['direccionales'];
			$pito = $_POST['pito'];
			$frenos = $_POST['frenos'];
			$guaya_acelerador = $_POST['guaya_acelerador'];
			$guaya_clutch = $_POST['guaya_clutch'];
			$estado_llantas = $_POST['estado_llantas'];
			$nivel_aceite = $_POST['nivel_aceite'];
			$kit_arrastre = $_POST['kit_arrastre'];
			$chaleco = $_POST['chaleco'];
			$espejos = $_POST['espejos'];
			$combustible = $_POST['combustible'];
			$boton_panico = $_POST['boton_panico'];
			$soat = $_POST['soat'];
			$tecnomecanica = $_POST['tecnomecanica'];
			$tarjeta_propiedad = $_POST['tarjeta_propiedad'];
			$observaciones = $_POST['observaciones'];
			$id_vehiculo_a_fk = $_POST['id_vehiculo_a_fk'];
			$nc = "NC";
			if (
				$baja === $nc ||
				$alta === $nc ||
				$stop === $nc ||
				$direccionales === $nc ||
				$pito === $nc ||
				$frenos === $nc ||
				$guaya_acelerador === $nc ||
				$guaya_clutch === $nc ||
				$estado_llantas === $nc ||
				$nivel_aceite === $nc ||
				$kit_arrastre === $nc ||
				$chaleco === $nc ||
				$espejos === $nc ||
				$combustible === $nc ||
				$boton_panico === $nc ||
				$soat === $nc ||
				$tecnomecanica === $nc ||
				$tarjeta_propiedad === $nc
			) {
				$displayStaffQuery = "SELECT id_vehiculo, placa, color, marca, motor, modelo, soat, tecnomecanica, rodamiento, ciudad, estado, observaciones_vehiculo FROM vehiculo WHERE id_vehiculo='{$id_vehiculo_a_fk}'

				";
				if ($result33 = $sqlconnection->query($displayStaffQuery)) {

					if ($result33->num_rows == 0) {
						echo 'ERROR';
					}
					//CONTADOR PARA QUE EL PRIMER SLIDER SEA EL ACTIVO
					while ($fila = $result33->fetch_array(MYSQLI_ASSOC)) {
						$id_vehiculo = $fila['id_vehiculo'];
						$placav = $fila['placa'];
					}
				}
				$fecha = date('Y-m-d');
				$titulo_correo = "REVISAR REGISTRO VEHICULO PLACA " . $placav . " DEL DIA " . $fecha;
				$mensaje_correo = "El registro Preoperativo del vehiculo con placas" . $placav . " contiene inconsistencias, por favor revisar el registro del dia " . $fecha . " para verificar las fallas alli reportadas";
				include('reportar_incidente.php');
			}
			$query = "INSERT INTO registro(baja, alta, stop, direccionales, pito, frenos, guaya_acelerador, guaya_clutch, estado_llantas, nivel_aceite, kit_arrastre, chaleco, espejos, combustible, boton_panico, soat, tecnomecanica, tarjeta_propiedad, observaciones,firma, id_vehiculo_a_fk) VALUES ('$baja','$alta' , '$stop' , '$direccionales' , '$pito', '$frenos' , '$guaya_acelerador','$guaya_clutch','$estado_llantas','$nivel_aceite','$kit_arrastre','$chaleco','$espejos','$combustible','$boton_panico','$soat','$tecnomecanica','$tarjeta_propiedad','$observaciones','$fileName','$id_vehiculo_a_fk')";
			if ($sqlconnection->query($query) === TRUE) {
				echo '
						<script>
						swal("Buen Trabajo!", "Registro Preoperativo guardado con éxito", "success").then(function() {
							window.location.replace("registro_preoperativo.php");
							});

							</script>
							';
			} else {
				echo "<script>swal('Ocurrio un error, inténtalo nuevamente');</script>";
			}
		
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
						<h3 class="card-title">Registro Preoperativo de Vehiculos</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form role="form" action="" method="POST" enctype="multipart/form-data" id="form">
						<div class="card-body row">

							<div class="form-group col-md-12 col-sm-12 col-xs-12">
								<label for="inputEmail4">Seleccione el Vehiculo</label>
								<select class="form-control input-sm " name="id_vehiculo_a_fk">

									<?php
									$sql_vendedor = mysqli_query($sqlconnection, "SELECT v.id_vehiculo, v.placa, v.color, v.marca, v.motor, v.modelo, v.soat, v.tecnomecanica, v.rodamiento, v.ciudad, v.estado, v.observaciones_vehiculo,u.id, u.identificacion, u.username, u.firstname, u.lastname, u.email, u.password, u.role, u.id_empresa_fk, av.id_asignacion,av.fecha_asignacion, av.id_vehiculo_fk, av.id_usuario_fk, av.estado_asignacion FROM asignacion_vehiculo av
													INNER JOIN users u
													ON av.id_usuario_fk=u.id 
													INNER JOIN vehiculo v 
													ON av.id_vehiculo_fk=v.id_vehiculo
													WHERE av.estado_asignacion='Activo' ");
									while ($rw = mysqli_fetch_array($sql_vendedor)) {
										$id_asignacion = $rw["id_asignacion"];
										$id_vehiculo = $rw["id_vehiculo"];
										$placa = $rw["placa"];
										$color = $rw["color"];
										$marca = $rw["marca"];

										$ciudad = $rw["ciudad"];
									?>
										<option value="<?php echo $id_vehiculo ?>" name="id_vehiculo_a_fk"><?php echo $placa . " - " . $color . " - " . $marca . " - " . $ciudad; ?></option>
									<?php
									}
									?>
								</select>
							</div>
							<div class="form-group col-md-3 col-sm-12 col-xs-12">
								<label for="user_title">Luz Baja</label>
								<select class="form-control" name="baja" id="">
									<option value='C'>Cumple</option>
									<option value='NC'>No Cumple</option>
								</select>
							</div>
							<div class="form-group col-md-3 col-sm-12 col-xs-12">
								<label for="user_title">Luz Alta</label>
								<select class="form-control" name="alta" id="">
									<option value='C'>Cumple</option>
									<option value='NC'>No Cumple</option>
								</select>
							</div>
							<div class="form-group col-md-3 col-sm-12 col-xs-12">
								<label for="user_title">Stop</label>
								<select class="form-control" name="stop" id="">
									<option value='C'>Cumple</option>
									<option value='NC'>No Cumple</option>
								</select>
							</div>
							<div class="form-group col-md-3 col-sm-12 col-xs-12">
								<label for="user_title">Direccionales</label>
								<select class="form-control" name="direccionales" id="">
									<option value='C'>Cumple</option>
									<option value='NC'>No Cumple</option>
								</select>
							</div>
							<div class="form-group col-md-3 col-sm-12 col-xs-12">
								<label for="user_title">Pito</label>
								<select class="form-control" name="pito" id="">
									<option value='C'>Cumple</option>
									<option value='NC'>No Cumple</option>
								</select>
							</div>
							<div class="form-group col-md-3 col-sm-12 col-xs-12">
								<label for="user_title">Frenos</label>
								<select class="form-control" name="frenos" id="">
									<option value='C'>Cumple</option>
									<option value='NC'>No Cumple</option>
								</select>
							</div>
							<div class="form-group col-md-3 col-sm-12 col-xs-12">
								<label for="user_title">Guaya Acelerador</label>
								<select class="form-control" name="guaya_acelerador" id="">
									<option value='C'>Cumple</option>
									<option value='NC'>No Cumple</option>
								</select>
							</div>
							<div class="form-group col-md-3 col-sm-12 col-xs-12">
								<label for="user_title">Guaya de Clutch</label>
								<select class="form-control" name="guaya_clutch" id="">
									<option value='C'>Cumple</option>
									<option value='NC'>No Cumple</option>
								</select>
							</div>
							<div class="form-group col-md-3 col-sm-12 col-xs-12">
								<label for="user_title">Estado de Llantas</label>
								<select class="form-control" name="estado_llantas" id="">
									<option value='C'>Cumple</option>
									<option value='NC'>No Cumple</option>
								</select>
							</div>
							<div class="form-group col-md-3 col-sm-12 col-xs-12">
								<label for="user_title">Nivel de Aceite</label>
								<select class="form-control" name="nivel_aceite" id="">
									<option value='C'>Cumple</option>
									<option value='NC'>No Cumple</option>
								</select>
							</div>
							<div class="form-group col-md-3 col-sm-12 col-xs-12">
								<label for="user_title">Kit de Arrastre</label>
								<select class="form-control" name="kit_arrastre" id="">
									<option value='C'>Cumple</option>
									<option value='NC'>No Cumple</option>
								</select>
							</div>
							<div class="form-group col-md-3 col-sm-12 col-xs-12">
								<label for="user_title">Chaleco</label>
								<select class="form-control" name="chaleco" id="">
									<option value='C'>Cumple</option>
									<option value='NC'>No Cumple</option>
								</select>
							</div>
							<div class="form-group col-md-3 col-sm-12 col-xs-12">
								<label for="user_title">Espejos</label>
								<select class="form-control" name="espejos" id="">
									<option value='C'>Cumple</option>
									<option value='NC'>No Cumple</option>
								</select>
							</div>
							<div class="form-group col-md-3 col-sm-12 col-xs-12">
								<label for="user_title">Combustible</label>
								<select class="form-control" name="combustible" id="">
									<option value='C'>Cumple</option>
									<option value='NC'>No Cumple</option>
								</select>
							</div>
							<div class="form-group col-md-3 col-sm-12 col-xs-12">
								<label for="user_title">Boton Panico</label>
								<select class="form-control" name="boton_panico" id="">
									<option value='C'>Cumple</option>
									<option value='NC'>No Cumple</option>
								</select>
							</div>
							<div class="form-group col-md-3 col-sm-12 col-xs-12">
								<label for="user_title">Soat</label>
								<select class="form-control" name="soat" id="">
									<option value='C'>Cumple</option>
									<option value='NC'>No Cumple</option>
								</select>
							</div>
							<div class="form-group col-md-3 col-sm-12 col-xs-12">
								<label for="user_title">Tecno/Mecanica</label>
								<select class="form-control" name="tecnomecanica" id="">
									<option value='C'>Cumple</option>
									<option value='NC'>No Cumple</option>
								</select>
							</div>
							<div class="form-group col-md-3 col-sm-12 col-xs-12">
								<label for="user_title">Tarjeta de Propiedad</label>
								<select class="form-control" name="tarjeta_propiedad" id="">
									<option value='C'>Cumple</option>
									<option value='NC'>No Cumple</option>
								</select>
							</div>
							<div class="form-group col-md-6 col-sm-12 col-xs-12">
								<a href="./politica.php" target="_blank"><label for="user_title">Acepta la Politica de tratamiendo de datos personales</label></a>
								<select class="form-control" name="politica" id="">
									<option value='C'>Acepto</option>
									<option value='NC'>No Acepto</option>
								</select>
							</div>
							<div class="form-group col-md-12 col-sm-12 col-xs-12">
								<label for="user_title">Observaciones</label>
								<textarea name="observaciones" id="" cols="20" rows="2" class="form-control"></textarea>
							</div>
							<div class="form-group col-md-12 col-sm-12 col-xs-12">
								<input type="hidden" name="base64" value="" id="base64">
								<label for="user_title">Firme aqui</label>
								<div id="signature-pad" class="signature-pad">

									<div class="signature-pad--body">
										<canvas style="width: 100%; height: 220px; border: 1px black solid; " id="canvas"></canvas>
									</div>
								</div>
							</div>

						</div>
						<!-- /.card-body -->

						<div class="card-footer">
							<button type="submit" name="add" class="btn bg-teal btn-block" value="Add User"><i class="fas fa-2x fa-sve"></i>&nbsp; &nbsp;&nbsp;Guardar Usuario</button>
						</div>
					</form>
				</div>
			</div>
	</section>
</div>
<?php
include('includes/adminfooter.php');
?>