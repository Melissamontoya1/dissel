<?php
include "includes/adminheader.php";
include ('includes/adminnav.php');
?>
<div class="wrapper">
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Main content -->
		<?php   if ($rol=="superadmin") { ?>
			<section class="content">
				<div class="container-fluid">
					<!-- Small boxes (Stat box) -->
					<div class="card shadow mb-4">
						<div class="card-body">
							<div class="col-md-12">
								<div class="card-header bg-navy">
									<i class="fas fa-list-alt"></i>
								Lista Actual de Registros Preoperativos </div>
								<!-- /.card-header -->
								<div class="card-body">
									<table id="" class="table display table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>Fecha</th>
												<th>Identificacón</th>
												<th>Nombre</th>
												<th>Placa</th>
												<th>Ciudad</th>
												<th>Ver Registro</th>
											</tr>
										</thead>
										<tbody>
											<?php 

											$displayStaffQuery = "SELECT r.id_registro,r.fecha_registro, r.id_vehiculo_a_fk,va.id_asignacion, va.fecha_asignacion, va.id_vehiculo_fk, va.id_usuario_fk,u.id, u.identificacion, u.username, u.firstname,u.email,v.id_vehiculo, v.placa, v.color, v.marca, v.motor, v.modelo, v.soat, v.tecnomecanica, v.rodamiento,v.ciudad, v.estado, v.observaciones_vehiculo FROM registro r
											INNER JOIN asignacion_vehiculo va
											ON r.id_vehiculo_a_fk=va.id_asignacion
											INNER JOIN users u 
											ON va.id_usuario_fk=u.id
											INNER JOIN vehiculo v
											ON va.id_vehiculo_fk=v.id_vehiculo
											";
											if ($result33 = $sqlconnection->query($displayStaffQuery)) {

												if ($result33->num_rows == 0) {
													echo '<div class="alert alert-info alert-dismissible">
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
													<h5><i class="icon fas fa-info"></i> Atención!</h5>
													Actualmente no hay ningun vehiculo asignado.
													</div>';

												}
                               //CONTADOR PARA QUE EL PRIMER SLIDER SEA EL ACTIVO

												while($filam = $result33->fetch_array(MYSQLI_ASSOC)) {
													$fecha_registro=$filam['fecha_registro'];
													$placa=$filam['placa'];
													$estado=$filam['estado'];
													$ciudad=$filam['ciudad'];
													$color=$filam['color'];
													$firstname=$filam['firstname'];
													$identificacion=$filam['identificacion'];
													$id_registro=$filam['id_registro'];
													$firstname=$filam['firstname'];
													?>
													<tr class="text-center">
														<td><?php echo $id_registro; ?></td>
														<td><?php echo $fecha_registro; ?></td>
														<td><?php echo $identificacion; ?></td>
														<td><?php echo $firstname; ?></td>
														<td><?php echo $placa; ?></td>
														<td><?php echo $ciudad; ?></td>

														<td class="text-center">
															<a href="plantilla.php?id_registro=<?php echo $id_registro ?>" title="Ver Formato" target="_blank"><button class="btn bg-success"><i class="fas fa-print"></i></button></a>

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
					<!-- /.tab-content -->
				</div><!-- /.card-body -->
			</section>
		</div>
		<!-- /.card -->
	</div>



<?php    }else{?>

<section class="content">
				<div class="container-fluid">
					<!-- Small boxes (Stat box) -->
					<div class="card shadow mb-4">

						
						<div class="card-body">
							<div class="col-md-12">
								<div class="card-header bg-navy">
									<i class="fas fa-list-alt"></i>
								Lista Actual de Registros Preoperativos </div>
								<!-- /.card-header -->
								<div class="card-body">
									<table id="" class="table display table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>Fecha</th>
												<th>Identificacón</th>
												<th>Nombre</th>
												<th>Placa</th>
												<th>Ciudad</th>
												<th>Ver Registro</th>
											</tr>
										</thead>
										<tbody>
											<?php 

											$displayStaffQuery = "SELECT r.id_registro,r.fecha_registro, r.id_vehiculo_a_fk,va.id_asignacion, va.fecha_asignacion, va.id_vehiculo_fk, va.id_usuario_fk,u.id, u.identificacion, u.username, u.firstname,u.email,v.id_vehiculo, v.placa, v.color, v.marca, v.motor, v.modelo, v.soat, v.tecnomecanica, v.rodamiento,v.ciudad, v.estado, v.observaciones_vehiculo FROM registro r
											INNER JOIN asignacion_vehiculo va
											ON r.id_vehiculo_a_fk=va.id_asignacion
											INNER JOIN users u 
											ON va.id_usuario_fk=u.id
											INNER JOIN vehiculo v
											ON va.id_vehiculo_fk=v.id_vehiculo WHERE id='".$_SESSION['id']."'
											";
											if ($result33 = $sqlconnection->query($displayStaffQuery)) {

												if ($result33->num_rows == 0) {
													echo '<div class="alert alert-info alert-dismissible">
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
													<h5><i class="icon fas fa-info"></i> Atención!</h5>
													Actualmente no hay ningun vehiculo asignado.
													</div>';

												}
                               //CONTADOR PARA QUE EL PRIMER SLIDER SEA EL ACTIVO

												while($filam = $result33->fetch_array(MYSQLI_ASSOC)) {
													$fecha_registro=$filam['fecha_registro'];
													$placa=$filam['placa'];
													$estado=$filam['estado'];
													$ciudad=$filam['ciudad'];
													$color=$filam['color'];
													$firstname=$filam['firstname'];
													$identificacion=$filam['identificacion'];
													$id_registro=$filam['id_registro'];
													$firstname=$filam['firstname'];
													?>
													<tr class="text-center">
														<td><?php echo $id_registro; ?></td>
														<td><?php echo $fecha_registro; ?></td>
														<td><?php echo $identificacion; ?></td>
														<td><?php echo $firstname; ?></td>
														<td><?php echo $placa; ?></td>
														<td><?php echo $ciudad; ?></td>

														<td class="text-center">
															<a href="plantilla.php?id_registro=<?php echo $id_registro ?>" title="Ver Formato" target="_blank"><button class="btn bg-success"><i class="fas fa-print"></i></button></a>

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
					<!-- /.tab-content -->
				</div><!-- /.card-body -->
			</section>

<?php  
}?>

<!-- /.content -->
</div>


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include "includes/adminfooter.php"; ?>
</body>
</html>
