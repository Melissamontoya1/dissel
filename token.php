<?php
include "admin/includes/connection.php";
include "includes/header.php";
$email = $_POST['email'];
$token = $_POST['token'];
$codigo = $_POST['codigo'];
$res = $sqlconnection->query("SELECT * FROM tokens WHERE 
        email='$email' and token='$token' and codigo='$codigo'") or die($sqlconnection->error);
$correcto = false;
if (mysqli_num_rows($res) > 0) {
    $fila = mysqli_fetch_row($res);
    $fecha = $fila[4];
    $fecha_actual = date("Y-m-d h:m:s");
    $seconds = strtotime($fecha_actual) - strtotime($fecha);
    $minutos = $seconds / 60;
    /* if($minutos > 10 ){
            echo "token vencido";
        }else{
            echo "todo correcto";
        }*/
    $correcto = true;
} else {
    $correcto = false;
}
?>

<div class="container">
    <div class="row justify-content-md-center" style="margin-top:15%">
        <?php if ($correcto) { ?>
            <form class="col-3" action="./cambiarpassword.php" method="POST">
                <h2>Restablecer Password</h2>
                <div class="mb-3">
                    <label for="c" class="form-label">Nuevo Password</label>
                    <input type="password" class="form-control" id="c" name="p1">

                </div>
                <div class="mb-3">
                    <label for="c" class="form-label">Confirmar Password</label>
                    <input type="password" class="form-control" id="c" name="p2">
                    <input type="hidden" class="form-control" id="c" name="email" value="<?php echo $email ?>">

                </div>

                <button type="submit" class="btn btn-primary">Cambiar</button>
            </form>
        <?php } else { ?>
            <div class="alert alert-danger">Código incorrecto o vencido</div>
        <?php } ?>

    </div>
</div>

<?php include "includes/footer.php" ?>
</body>

</html>