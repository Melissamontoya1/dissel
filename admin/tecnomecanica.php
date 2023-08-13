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
									<table  class="table  table-bordered table-striped" id="soat">
										<thead>
											<tr>
												<th>Placa</th>
												<th>Color</th>
												<th>Marca</th>
												<th>Motor</th>
												<th>Modelo</th>
												<th>Tecnomecanica</th>
												<th>Soat</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											<?php 

											$displayStaffQuery = "SELECT id_vehiculo, placa, color, marca, motor, modelo, soat, tecnomecanica, rodamiento, ciudad, estado, observaciones_vehiculo FROM vehiculo ORDER BY soat ASC
											
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
												while($filam = $result33->fetch_array(MYSQLI_ASSOC)) {
													$placa=$filam['placa'];
													$color=$filam['color'];
													$marca=$filam['marca'];
													$motor=$filam['motor'];
													$modelo=$filam['modelo'];
													$soat=$filam['soat'];
													$tecnomecanica=$filam['tecnomecanica'];
													?>
													<tr class="text-center">
														<td><?php echo $placa; ?></td>
														<td><?php echo $color; ?></td>
														<td><?php echo $marca; ?></td>
														<td><?php echo $motor; ?></td>
														<td><?php echo $modelo; ?></td>
														<td><?php echo $tecnomecanica; ?></td>
														<td><?php echo $soat; ?></td>
													<!-- 	<td class="text-center">
															<a href="plantilla.php?id_registro=<?php echo $id_registro ?>" title="Ver Formato" target="_blank"><button class="btn bg-success"><i class="fas fa-print"></i></button></a>

														</td> -->

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



<?php    }else{}?>

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
