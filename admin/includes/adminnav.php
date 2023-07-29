  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  	<!-- Left navbar links -->
  	<ul class="navbar-nav">
  		<li class="nav-item">
  			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
  		</li>
  		<li class="nav-item d-none d-sm-inline-block">
  			<a href="index.php" class="nav-link">Inicio</a>
  		</li>
  		<!-- <li class="nav-item d-none d-sm-inline-block" hidden>
  			<a href="#" class="nav-link">Graficos</a>
  		</li> -->
  	</ul>

  	<!-- Right navbar links -->
  	<ul class="navbar-nav ml-auto">



  		
      <li class="nav-item">
        <a class="dropdown-item" href="../logout.php" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Cerrar Sesion
        </a>

      </li>
      <li class="nav-item">
       <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
     <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
      <i class="fas fa-th-large"></i>
    </a>
  </li>
</ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
 <!-- Brand Logo -->
 <a href="index.php" class="brand-link">
  <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  <span class="brand-text font-weight-light" style="font-size :15px;"><?php echo $nombre_empresa; ?></span>
</a>

<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
   <div class="image">
    <img src="img/<?php echo $logotipo_empresa; ?>" class="img-circle elevation-2" alt="User Image">
  </div>
  <div class="info">
    <a href="./profile.php?section=<?php echo $_SESSION['username']; ?>" class="d-block"><?php echo $_SESSION['firstname']; ?></a>
  </div>
</div>

<!-- SidebarSearch Form -->
<div class="form-inline">
 <div class="input-group" data-widget="sidebar-search">
  <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
  <div class="input-group-append">
   <button class="btn btn-sidebar">
    <i class="fas fa-search fa-fw"></i>
  </button>
</div>
</div>
</div>

<!-- Sidebar Menu -->
<nav class="mt-2">
 <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
          	with font-awesome or any other icon font library -->
             <?php 
             if ($rol=="superadmin") {?>
          	<li class="nav-item">
          		<a href="index.php" class="nav-link active">
          			<i class="far fa-circle nav-icon"></i>
          			<p>Panel de Control</p>
          		</a>
          	</li>
             <?php }
   ?>

            <?php   if ($rol=="user") { ?>
                 <li class="nav-item">
        <a href="./registro_preoperativo.php" class="nav-link">
         <i class="fas fa-clipboard-check nav-icon" ></i>
         <p> Registro Preoperativo</p>
       </a>
     </li>
   <?php }
   ?>
           <li class="nav-item">
            <a href="./registros_realizados.php" class="nav-link">
              <i class="fas fa-clipboard-list nav-icon"></i>
              <p> Registros</p>
            </a>
          </li>
          <?php 
  if ($rol=="superadmin") {?>
          <li class="nav-item">
            <a href="./asignacion_vehiculo.php" class="nav-link">
             <i class="fas fa-biking nav-icon"></i>
             <p> Asignar Vehiculos</p>
           </a>
         </li>

         <li class="nav-item">
          <a href="./vehiculos.php" class="nav-link">
           <i class="fas fa-motorcycle nav-icon"></i>
           <p> Vehiculos</p>
         </a>
       </li>
     <!-- MENU USUARIOS -->
     <li class="nav-item">
      <a href="#" class="nav-link">
       <i class="fas fa-users nav-icon"></i>
       <p> Usuarios
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
     <li class="nav-item">
      <a class="nav-link" href="./users.php">
       <i class="far fa-circle nav-icon"></i>
       <p> Consultar Usuarios</p>
     </a>
   </li>

   <li class="nav-item">
    <a href="./adduser.php" class="nav-link">
     <i class="far fa-circle nav-icon"></i>
     <p> Agregar Usuario</p>
   </a>
 </li>
</ul>
</li>

  
<li class="nav-item" >
  <a href="./correos.php" class="nav-link">
    <i class="fas fa-envelope-open-text nav-icon"></i>
    <p> Correos Masivos</p>
  </a>
</li>
<!-- MENU EMPRESA -->
<li class="nav-item">
  <a href="./empresa_personal.php" class="nav-link">
    <i class="fas fa-city nav-icon"></i>
    <p> Configurar Empresa

    </p>
  </a>
</li>
<?php } ?>
<!-- CIERRE ETIQUETAS DEL NAV -->
</ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
