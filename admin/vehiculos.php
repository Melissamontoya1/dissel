<!-- AGREGAR LA CLASE GUMP CUANDO TENGAMOS EL NUEVO SERVIDOR Y ASI PODER PONER RESTRINGCIONES EL EL TEXTO PW Y DEMAS -->
<?php

include('includes/adminheader.php');
include ('includes/adminnav.php');

if (isset($_POST['registrar_vehiculo'])) {

	$placa=$_POST['placa'];
	$color = $_POST['color'];
	$marca = $_POST['marca'];
	$motor = $_POST['motor'];
	$modelo=$_POST['modelo'];
	$soat = $_POST['soat'];
	$tecnomecanica = $_POST['tecnomecanica'];
	$rodamiento = $_POST['rodamiento'];
	$ciudad=$_POST['ciudad'];
	$estado = $_POST['estado'];
	$observaciones_vehiculo = $_POST['observaciones_vehiculo'];
	
	

	$query = "INSERT INTO vehiculo(placa, color, marca, motor, modelo, soat, tecnomecanica, rodamiento, ciudad, estado, observaciones_vehiculo) VALUES ('$placa','$color' , '$marca', '$motor' , '$modelo', '$soat', '$tecnomecanica', '$rodamiento' , '$ciudad' , '$estado' , '$observaciones_vehiculo'    )";
	if ($sqlconnection->query($query) === TRUE) {
		echo '<script>
		swal("Buen Trabajo!", "Se registro el vehiculo con éxito", "success").then(function() {
			window.location.replace("vehiculos.php");
			});

			</script>';
			

		}
		else {
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
				<br>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
					Registrar Vehiculo
				</button>
				<br>
				<br>

				<!-- Small boxes (Stat box) -->
				<div class="card shadow mb-4">


					<div class="card-body">
						<div class="col-md-12">
							<div class="card-header bg-navy">
								<i class="fas fa-list-alt"></i>
							Lista Actual de Vehiculos </div>
							<!-- /.card-header -->
							<div class="card-body">
								<table  class="table  table-bordered table-striped" id="soat">
									<thead>
										<tr>
											<th>Placa</th>
											<th>Color</th>
											<th>Marca</th>
											<th>Motor</th>
											<th>Modelo</th>
											<th>Soat</th>
											<th>Tecnomecanica</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
										<?php 

										$displayStaffQuery = "SELECT id_vehiculo, placa, color, marca, motor, modelo, soat, tecnomecanica, rodamiento, ciudad, estado, observaciones_vehiculo FROM vehiculo ORDER BY id_vehiculo ASC

										";
										if ($result33 = $sqlconnection->query($displayStaffQuery)) {

											if ($result33->num_rows == 0) {
												echo '<div class="alert alert-info alert-dismissible">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												<h5><i class="icon fas fa-info"></i> Atención!</h5>
												Actualmente no hay ningun vehiculo registrado.
												</div>';

											}
                               //CONTADOR PARA QUE EL PRIMER SLIDER SEA EL ACTIVO

											while($fila = $result33->fetch_array(MYSQLI_ASSOC)) {
												$id_vehiculo=$fila['id_vehiculo'];
												$placa=$fila['placa'];
												$color=$fila['color'];
												$marca=$fila['marca'];
												$motor=$fila['motor'];
												$modelo=$fila['modelo'];
												$soat=$fila['soat'];
												$tecnomecanica=$fila['tecnomecanica'];

												?>
												<tr class="text-center">
													<td><?php echo $placa; ?></td>
													<td><?php echo $color; ?></td>
													<td><?php echo $marca; ?></td>
													<td><?php echo $motor; ?></td>
													<td><?php echo $modelo; ?></td>
													<td><?php echo $soat; ?></td>
													<td><?php echo $tecnomecanica; ?></td>

													<td class="text-center">
														<button type="button" class="btn bg-warning" data-toggle="modal" data-target="#EditarVehiculo" data-id_vehiculo="<?php echo $fila['id_vehiculo'] ?>" data-soat="<?php echo $fila['soat']?>" data-tecnomecanica="<?php echo $fila['tecnomecanica']?>" data-color="<?php echo $fila['color']?>" data-marca="<?php echo $fila['marca']?>" data-placa="<?php echo $fila['placa']?>" data-modelo="<?php echo $fila['modelo']?>" data-motor="<?php echo $fila['motor']?>">
															Editar
														</button>
													</td>


												</tr>

												<?php 	
											}
										} ?>


									</tbody>

								</table>
							</div>



						</div>
					</div>
				</div>
			</section>
		</div>
		<!-- Modal -->
		<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content ">
					<div class="modal-header bg-primary">
						<h5 class="modal-title" id="exampleModalLabel">Registrar Vehiculo</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body ">

						<!-- /.card-header -->
						<!-- form start -->
						<form role="form" action="" method="POST" enctype="multipart/form-data" >
							<div class="card-body row">
								<div class="form-group col-md-4 col-sm-12 col-xs-12">
									<label for="user_title">Placa</label>
									<input type="text" name="placa" class="form-control" required>
								</div>

								<div class="form-group col-md-4 col-sm-12 col-xs-12">
									<label for="user_author">Color</label>
									<input type="text" name="color" class="form-control" required>
								</div>
								<div class="form-group col-md-4 col-sm-12 col-xs-12">
									<label for="user_title">Marca</label>
									<input type="text" name="marca" class="form-control" required>
								</div>

								<div class="form-group col-md-4 col-sm-12 col-xs-12">
									<label for="user_tag">Motor</label>
									<input type="text" name="motor" class="form-control" required>
								</div>
								<div class="form-group col-md-4 col-sm-12 col-xs-12">
									<label for="user_tag">Modelo</label>
									<input type="text" name="modelo" class="form-control" required>
								</div>
								<div class="form-group col-md-4 col-sm-12 col-xs-12">
									<label for="user_tag">Fecha de Vencimiento Soat</label>
									<input type="date" name="soat" class="form-control" required>
								</div>
								<div class="form-group col-md-4 col-sm-12 col-xs-12">
									<label for="user_tag">Fecha de Vencimiento Tecno/Mecanica</label>
									<input type="date" name="tecnomecanica" class="form-control" required>
								</div>
								<div class="form-group col-md-4 col-sm-12 col-xs-12">
									<label for="user_title">Rodamiento</label>
									<select class="form-control" name="rodamiento" id="">
										<option value='Si'>Si</option>
										<option value='No'>No</option>
									</select>
								</div>
								<div class="form-group col-md-4 col-sm-12 col-xs-12">
									<label for="user_tag">Ciudad</label>
									<select class="form-control" name="ciudad" id="">
										<option value='Armenia'>Armenia</option>
										<option value='Cartago'>Cartago</option>
										<option value='Cali'>Cali</option>
										<option value='Manizales'>Manizales</option>
										<option value='Pereira'>Pereira</option>
										<option value='Tulua'>Tulua</option>
									</select>
								</div>
								<div class="form-group col-md-4 col-sm-12 col-xs-12">
									<label for="user_tag">Estado del Vehiculo</label>
									<select class="form-control" name="estado" id="">
										<option value='Habilitado'>Habilitado</option>
										<option value='Inhabilitado'>Inhabilitado</option>
										<option value='Reparacion'>En Reparacion</option>

									</select>
								</div>
								<div class="form-group col-md-8 col-sm-12 col-xs-12">
									<label for="user_tag">Observaciones</label>
									<input type="text" name="observaciones_vehiculo" class="form-control" >
								</div>

							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<button type="submit" name="registrar_vehiculo" class="btn bg-teal btn-block" value="Add User"><i class="fas fa-2x fa-save"></i>&nbsp; &nbsp;&nbsp;Guardar Usuario</button>
							</div>
						</form>

					</div>
					<div class="modal-footer" hidden>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>

		<!-- MODAL PARA EDITAR DATOS DEL USUARIO -->
		<div class="modal fade" id="EditarVehiculo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog ">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h5 class="modal-title text-center" id="exampleModalLabel">Datos Vehiculo</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">
						<form action="">
							<!-- general form elements -->
							

							<div class="card-body">

								<div clas="col-md-12 card-body">
									<div class="row">
										<div class="col-md-6">
											<label for="">Placa</label>
											<div class="input-group ">
												
												<input type="text" id="placa" class="form-control"  placeholder="Placa Vehiculo">
												<input type="hidden" id="id_vehiculo">
											</div>
										</div>
										<div class="col-md-6">
											<label for="">Color</label>
											<div class="input-group">
												<input type="text" id="color" class="form-control" placeholder="Color">
											</div>
										</div>
										<div class="col-md-6">
											<label for="">Marca </label>
											<div class="input-group">
												<input type="text" id="marca" class="form-control" placeholder="Marca ">
											</div>
										</div>
										<div class="col-md-6">
											<label for="">Motor </label>
											<div class="input-group">
												<input type="text" id="motor" class="form-control" placeholder="Motor ">
											</div>
										</div>
										<div class="col-md-6">
											<label for="">Modelo </label>
											<div class="input-group">
												<input type="text" id="modelo" class="form-control" placeholder=" Modelo">
											</div>
										</div>
										<div class="col-md-6">
											<label for="">Soat </label>
											<div class="input-group">
												<input type="date" id="soat2" class="form-control" placeholder="Soat ">
											</div>
										</div>
										<div class="col-md-6">
											<label for="">Tecnomecanica </label>
											<div class="input-group">
												<input type="date" id="tecnomecanica" class="form-control" placeholder="Correo Electronico">
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
							<button type="button" class="btn btn-success" name="editar_datos" id="editar_datos">Actualizar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	include('includes/adminfooter.php');
	?>
	<script>
		$('#EditarVehiculo').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget); // Button that triggered the modal
              var id_vehiculo = button.data('id_vehiculo'); // Extract info from data-* attributes
              var placa = button.data('placa'); 
              var color = button.data('color'); 
              var marca = button.data('marca');
              var motor = button.data('motor'); 
              var modelo = button.data('modelo');
              var soat = button.data('soat');  
              var tecnomecanica = button.data('tecnomecanica'); 
              //var category = button.data('category');

              // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
              var modal = $(this);

              modal.find('.modal-body #id_vehiculo').val(id_vehiculo);
              modal.find('.modal-body #placa').val(placa);
              modal.find('.modal-body #color').val(color);
              modal.find('.modal-body #marca').val(marca);
              modal.find('.modal-body #motor').val(motor);
              modal.find('.modal-body #modelo').val(modelo);
              modal.find('.modal-body #soat2').val(soat);
              modal.find('.modal-body #tecnomecanica').val(tecnomecanica);
          });






      </script>