<?php
  session_start();
  error_reporting(0);
  $validar = $_SESSION['nombre'];
  $p_id = $_SESSION['id'];

  echo $p_id;

  $autorizacion = $_SESSION["rol"];
  if( $autorizacion == 1){
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
    <title>Registro de Platillos</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  </head>
  <body id="page-top">
    <form action="../includes/vplatillo.php" method="POST">
      <div id="login" >
        <div class="container">
          <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
              <div id="login-box" class="col-md-12">
                <br><br><br>
                <h3 class="text-center">Registro de nuevo platillo</h3>
                
                <div class="form-group">
                  <label for="p_nombre" class="form-label">Nombre del platillo:</label>
                  <input type="text" id="p_nombre" name="p_nombre" class="form-control" placeholder="Ingresa el nombre del platillo" pattern="^[a-zA-Z]+[a-zA-Z0-9]*$" required>
                </div>

                <div class="form-group">
                  <label for="p_precio" class="form-label">Precio:</label>
                  <input type="number" id="p_precio" name="p_precio" class="form-control" min="1" placeholder="Ingresa el precio del platillo" required>
                </div>

                <div class="form-group">
                  <label for="p_descripcion" class="form-label">Descripción:</label>
                  <textarea id="p_descripcion" name="p_descripcion" class="form-control" rows="4" placeholder="Ingresa una descripción del platillo" required></textarea>
                </div>

                <div class="form-group">
                  <label for="p_url_imagen" class="form-label">UrlImagen:</label>
                  <input type="file"  id="p_url_imagen" name="p_url_imagen" class="form-control" placeholder="Ingresa el url" required>
                </div>

                <div class="form-group">
                  <label for="p_categoria">Categoría:</label><br>
                  <select name="p_categoria" id="p_categoria" class="form-control" required>
                    <option value="" disabled selected hidden>Seleccione una categoría</option>
                    <option value="Entrada">Entrada</option>
                    <option value="Plato principal">Plato principal</option>
                    <option value="Postre">Postre</option>
                  </select>
                </div>
                <div class="mb-3">
                  <input type="submit" value="Guardar" class="btn btn-success" name="registrar">
                  <a href="../views/lector.php" class="btn btn-danger">Cancelar</a>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </body>
</html>
