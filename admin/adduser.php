<?php
include('includes/adminheader.php');
include('includes/adminnav.php');
if (isset($_SESSION['role'])) {
	$currentrole = $_SESSION['role'];
}
if ($currentrole == 'user') {
	echo "<script> alert('Solo los Administradores pueden agregar Usuarios');
	window.location.href='./index.php'; </script>";
} else {
	if (isset($_POST['add'])) {
		if ($_POST['password'] !== $_POST['cpassword']) {
			echo  "<center><font color='red'>Las contraseñas no coinciden </font></center>";
		} else {
			$identificacion = $_POST['identificacion'];
			$firstname = $_POST['firstname'];
			$lastname = "No";
			$email = $_POST['email'];
			$role = $_POST['role'];
			$pass = $_POST['password'];
			$username = $_POST['username'];
			$password = password_hash("$pass", PASSWORD_DEFAULT);
			$query = "INSERT INTO users(identificacion, username, firstname,lastname, email, password, role, id_empresa_fk) VALUES ('$identificacion','$username' , '$firstname' , '$lastname' , '$email', '$password' , '$role','$id_empresa')";
			if ($sqlconnection->query($query) === TRUE) {
				echo "<script>swal('Nuevo Usuario Agregado');
				window.location.href='users.php';</script>";
			} else {
				echo "<script>swal('Ocurrio un error, inténtalo nuevamente');</script>";
			}
		}
	}
} ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<section class="content">
		<div class="container-fluid">
			<!-- Page Heading -->
			<div class="row">
				<div class="card card-primary col-xs-12 col-sm-12 col-md-12">
					<div class="card-header">
						<h3 class="card-title">Registrar Usuarios</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form role="form" action="" method="POST" enctype="multipart/form-data">
						<div class="card-body row">
							<div class="form-group col-md-6 col-sm-12 col-xs-12">
								<label for="user_title">Identificacion</label>
								<input type="number" name="identificacion" class="form-control" required>
							</div>

							<div class="form-group col-md-6 col-sm-12 col-xs-12">
								<label for="user_author">Nombres y Apellidos</label>
								<input type="text" name="firstname" class="form-control" required>
							</div>
							<div class="form-group col-md-4 col-sm-12 col-xs-12">
								<label for="user_title">Usuario</label>
								<input type="text" name="username" class="form-control" required>
							</div>
							<div class="form-group col-md-4 col-sm-12 col-xs-12">
								<label for="user_role">Rol</label>
								<select class="form-control" name="role" id="">
									<?php
									echo "<option value='user'>Técnico</option>";
									if ($rol == "superadmin") {
										echo "<option value='superadmin'>Administrador</option>";
									}
									?>
								</select>
							</div>
							<div class="form-group col-md-4 col-sm-12 col-xs-12">
								<label for="user_tag">Correo</label>
								<input type="email" name="email" class="form-control" required>
							</div>
							<div class="form-group col-md-6 col-sm-12 col-xs-12">
								<label for="user_tag">Contraseña</label>
								<input type="password" name="password" class="form-control" required>
							</div>
							<div class="form-group col-md-6 col-sm-12 col-xs-12">
								<label for="user_tag">Confirmar Contraseña</label>
								<input type="password" name="cpassword" class="form-control" required>
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<button type="submit" name="add" class="btn bg-teal btn-block" value="Add User"><i class="fas fa-2x fa-save"></i>&nbsp; &nbsp;&nbsp;Guardar Usuario</button>
						</div>
					</form>
				</div>
			</div>
	</section>
</div>
<?php include('includes/adminfooter.php'); ?>