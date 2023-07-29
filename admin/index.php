<?php
include "includes/adminheader.php";
include ('includes/adminnav.php');

?>
<div class="wrapper">

  <!-- Preloader -->
<!--   <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Panel de control</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Información</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php   if ($rol=="superadmin") { ?>
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-md-4">
              <!-- small box -->
              <?php 
              if ($estado_empresa<>"Inactiva") { ?>
                <?php
                $query = "SELECT * FROM users WHERE id_empresa_fk='{$id_empresa}'";
                $result = mysqli_query($sqlconnection, $query) or die(mysqli_error($sqlconnection));
                $user_num = mysqli_num_rows($result);
                ?>
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3><?php  echo "{$user_num}"; ?></h3>

                    <p>Usuarios</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-users"></i>
                  </div>
                  <a href="./users.php" class="small-box-footer">Más informacíón<i class="fas fa-arrow-circle-right"></i></a>
                </div>


              <?php } ?>
            </div>
            <div class="col-lg-3 col-md-4">
              <!-- small box -->
              <?php 
              if ($estado_empresa<>"Inactiva") { ?>
                <?php
                $query = "SELECT * FROM vehiculo  ";
                $result = mysqli_query($sqlconnection, $query) or die(mysqli_error($sqlconnection));
                $num_soat = mysqli_num_rows($result);
                ?>
                <div class="small-box bg-primary">
                  <div class="inner">
                    <h3><?php  echo "{$num_soat}"; ?></h3>

                    <p>SOAT</p>
                  </div>
                  <div class="icon">
                   <i class="fas fa-car-crash"></i>
                  </div>
                  <a href="./soat.php" class="small-box-footer">Más informacíón<i class="fas fa-arrow-circle-right"></i></a>
                </div>


              <?php } ?>
            </div>
           
                  <div class="col-lg-3 col-md-4">
              <!-- small box -->
              <?php 
              if ($estado_empresa<>"Inactiva") { ?>
                <?php
                $query = "SELECT * FROM vehiculo ";
                $result = mysqli_query($sqlconnection, $query) or die(mysqli_error($sqlconnection));
                $num_soat = mysqli_num_rows($result);
                ?>
                <div class="small-box bg-primary">
                  <div class="inner">
                    <h3><?php  echo "{$num_soat}"; ?></h3>

                    <p>TECNO/MECANICA</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-oil-can"></i>
                  </div>
                  <a href="./tecnomecanica.php" class="small-box-footer">Más informacíón<i class="fas fa-arrow-circle-right"></i></a>
                </div>


              <?php } ?>
            </div>
            <!-- ./col -->
          </div>
          <!-- ./col -->
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
    <?php    }else{ ?>
      <br>
      <h4 class="text-center">Bienvenido <?php echo $_SESSION['firstname'] ?> recuerda realizar tus registros a tiempo</h4>
      <div class="tab-pane" id="asignados" >
        <?php 
        $id=$_SESSION['id'];
        $displayStaffQuery = "SELECT v.id_vehiculo, v.placa, v.color, v.marca, v.motor, v.modelo, v.soat, v.tecnomecanica, v.rodamiento, v.ciudad, v.estado, v.observaciones_vehiculo,u.id, u.identificacion, u.username, u.firstname, u.lastname, u.email, u.password, u.role, u.id_empresa_fk, av.id_asignacion,av.fecha_asignacion, av.id_vehiculo_fk, av.id_usuario_fk, av.estado_asignacion FROM asignacion_vehiculo av
        INNER JOIN users u
        ON av.id_usuario_fk=u.id 
        INNER JOIN vehiculo v 
        ON av.id_vehiculo_fk=v.id_vehiculo
        WHERE av.estado_asignacion='Activo' AND av.id_usuario_fk='$id'";
        if ($result33 = $sqlconnection->query($displayStaffQuery)) {

          if ($result33->num_rows == 0) {
            echo '<div class="alert alert-info alert-dismissible" hidden>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-info"></i> Atención!</h5>
            Actualmente no hay ningun vehiculo asignado.
            </div>';

          }
                               //CONTADOR PARA QUE EL PRIMER SLIDER SEA EL ACTIVO

          while($filam = $result33->fetch_array(MYSQLI_ASSOC)) {
            $id_vehiculo=$filam['id_vehiculo'];
            $placa=$filam['placa'];
            $estado=$filam['estado'];
            $ciudad=$filam['ciudad'];
            $color=$filam['color'];
            $firstname=$filam['firstname'];
            $identificacion=$filam['identificacion'];
            ?>
            <div class="col-md-4 col-sm-6 col-xs-3 " hidden> 
              <div class="card-body">
                <div class="info-box bg-navy">
                  <span class="info-box-icon"><i class="fas fa-motorcycle nav-icon"></i></span>

                  <div class="info-box-content text-center">
                    <span class="info-box-text"><?php echo $placa; ?></span>
                    <span class="info-box-number"><?php echo $identificacion ?></span>
                    <span class="info-box-number"><?php echo $firstname ?></span>
                    <span class="info-box-number"><?php echo $ciudad ?></span>


                  </div>

                  <!-- /.info-box-content -->
                </div>
                <div class="col-md-12 card">
                  <div class="row">
                    <div class="col-md-12">  
                      <a href="order.php?id_mesa=<?php echo $fila['id_vehiculo']; ?>"><button class="btn btn-primary  col-sm-12 col-md-12" title="Realizar Registro Preoperativo"><i class="fas fa-clipboard-check"> </i>Registro Preoperativo</button></a>
                    </div>
                    <div class="col-md-12">
                      <a href="order.php?id_mesa=<?php echo $fila['id_vehiculo']; ?>"><button class="btn bg-warning  col-sm-12 col-md-12" title="Reportar Falla"><i class="fas fa-tools"></i>Reportar Falla</button></a>
                    </div>
                  </div>
                </div>
                <!-- /.info-box -->
              </div>
            </div>




            <?php  


          } } 



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
