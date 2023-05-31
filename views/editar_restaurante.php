<?php
  session_start();
  error_reporting(0);
  $validar = $_SESSION['nombre'];
  if( $validar == null || $validar = ''){
    header("Location: ../includes/login.php");
    die();
  }
  $autorizacion = $_SESSION["rol"];
  if( $autorizacion == 2){
    header("Location: ../includes/_sesion/cerrarSesion.php");
    die();
  }
  $r_id= $_GET['id'];
  $conexion= mysqli_connect("localhost", "root", "", "r_user");
  $consulta= "SELECT * FROM restaurant WHERE id = $r_id";
  $resultado = mysqli_query($conexion, $consulta);
  $usuario = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  </head>
  <body id="page-top">
    <form  action="../includes/_functions.php" method="POST">
      <div id="login" >
        <div class="container">
          <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
              <div id="login-box" class="col-md-12">

              <br>
              <br>
              <h3 class="text-center">Editar empresa</h3>

              <div class="form-group">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text"  id="r_nombre" name="r_nombre" class="form-control" value="<?php echo $usuario['r_nombre'];?>" required>
              </div>
              <div class="form-group">
                <label for="nit">NIT:</label><br>
                <input type="number" name="nit" id="nit" class="form-control" min="9" value="<?php echo $usuario['nit'];?>" required>
              </div>

              <br>

              <input type="hidden" name="accion" value="editar_registrores">
              <input type="hidden" name="id" value="<?php echo $r_id;?>">

              <br>

              <div class="mb-3">

              <button type="submit" class="btn btn-success" >Editar</button>
              <a href="user.php" class="btn btn-danger">Cancelar</a>

              </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </body>
</html>