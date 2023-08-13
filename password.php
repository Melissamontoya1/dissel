<?php include "includes/header.php"; ?>
<center>
  <br></br>
  <div class="login-box text-center">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <center><img src="admin/img/logo.png" class="img-fluid pt-5" style="width: 50%;"></center>
      </div>
      <div class="card-body">
        <p class="login-box-msg">¿Olvidaste tu contraseña? Aquí puede recuperar fácilmente una nueva contraseña.</p>
        <form action="./recovery.php" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" id="c" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Recuperar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <p class="mt-3 mb-1">
          <a href="index.php">Login</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
</center>
<!-- /.login-box -->
<?php
include('includes/footer.php');
?>

</body>

</html>