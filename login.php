<?php
session_start();
include('admin/includes/connection.php');
if (isset($_POST['login'])) {
	$username  = $_POST['user_name'];
	$password = $_POST['user_password'];
	mysqli_real_escape_string($sqlconnection, $username);
	mysqli_real_escape_string($sqlconnection, $password);
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($sqlconnection , $query) or die (mysqli_error($sqlconnection));
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_array($result)) {
		$id = $row['id'];
		$identificacion = $row['identificacion'];
		$user = $row['username'];
		$pass = $row['password'];
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$email = $row['email'];
		$role= $row['role'];
		if (password_verify($password, $pass )) {
			$_SESSION['id']= $id;
			$_SESSION['identificacion']= $identificacion;
			$_SESSION['username'] = $user;
			$_SESSION['firstname'] = $firstname;
			$_SESSION['lastname'] = $lastname;
			$_SESSION['email']  = $email;
			$_SESSION['role'] = $role;
			header('location: admin');
		}
		else {
			echo "<script>alert('usuario / contraseña invalida');
			window.location.href= 'index.php';</script>";

		}
	}
}else{
			echo "<script>alert('usuario / contraseña invalida');
			window.location.href= 'index.php';</script>";

		}
}else{
	header('location: index.php');
}

?>