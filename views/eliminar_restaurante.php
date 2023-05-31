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
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-5">
      <div class="row">
        <div class="col-sm-6 offset-sm-3">
          <div class="alert alert-danger text-center">
          <p>¿Desea confirmar la eliminación del restaurante?</p>
          </div>
        <div class="row">
        <div class="col-sm-6">
        <form action="../includes/_functions.php" method="POST">
          <input type="hidden" name="accion" value="eliminar_registrores">
          <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
          <input type="submit" name="" value="Eliminar" class= " btn btn-danger">
          <a href="user.php" class="btn btn-success">Cancelar</a>
        </form>
        </div>
      </div>
    </div>
  </body>
</html>