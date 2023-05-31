<?php
  session_start();
  error_reporting(0);
  $validar = $_SESSION['nombre'];
  if( $validar == null || $validar = ''){
    header("Location: ../includes/login.php");
    die();
  }
  $autorizacion = $_SESSION["rol"];
  if( $autorizacion == 1){
    header("Location: ../includes/_sesion/cerrarSesion.php");
    die();
  }
  $platillo_id= $_GET['id'];
  $conexion= mysqli_connect("localhost", "root", "", "r_user");
  $consulta= "SELECT * FROM platillos WHERE id = $platillo_id";
  $resultado = mysqli_query($conexion, $consulta);
  $platillo = mysqli_fetch_assoc($resultado);
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
              <h3 class="text-center">Editar platillo</h3>

              <div class="form-group">
                <label for="nombre" class="form-label">Nombre del platillo:</label>
                <input type="text"  id="p_nombre" name="p_nombre" value="<?php echo $platillo['p_nombre'];?>" class="form-control" required>

                <label for="precio">Precio:</label><br>
                <input type="number" name="p_precio" id="p_precio" class="form-control" min="9" value="<?php echo $platillo['p_precio'];?>" required>

                <label for="p_descripcion" class="form-label">Descripción:</label>
                <input id="p_descripcion" name="p_descripcion" class="form-control" value="<?php echo $platillo['p_descripcion'];?>" required>

                <label for="p_url_imagen" class="form-label">UrlImagen:</label>
                <input type="file"  id="p_url_imagen" name="p_url_imagen" class="form-control" placeholder="Ingresa el url" required>

                <label for="p_categoria">Categoría:</label><br>
                <select name="p_categoria" id="p_categoria" class="form-control" required>
                  <option value="" disabled selected hidden>Seleccione una categoría</option>
                  <option value="Entrada">Entrada</option>
                  <option value="Plato principal">Plato principal</option>
                  <option value="Postre">Postre</option>
                </select>
              </div>
              <br>

              <input type="hidden" name="accion" value="editar_registroplat">
              <input type="hidden" name="id" value="<?php echo $platillo_id;?>">

              <br>

              <div class="mb-3">

              <button type="submit" class="btn btn-success" >Editar</button>
              <a href="lector.php" class="btn btn-danger">Cancelar</a>

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