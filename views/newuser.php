<?php
  session_start();
  error_reporting(0);
  $validar = $_SESSION['nombre']; 
  if( $validar == null || $validar = ''){
    header("Location: ./includes/login.php");
    die();
  }
$autorizacion = $_SESSION["rol"];

echo $autorizacion;
if($autorizacion == 2){
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
    <title>Registro usuarios</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  </head>
  <body id="page-top">
    <form  action="../includes/validar.php" method="POST">
      <div id="login" >
        <div class="container">
          <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
              <div id="login-box" class="col-md-12">
                <br>
                <br>
                <h3 class="text-center">Registro de nuevo usuario</h3>

                <div class="form-group">
                  <label for="nombre" class="form-label">Nombre:</label>
                  <input type="text"  id="nombre" name="nombre" class="form-control" placeholder="Ingresa el nombre" required>
                </div>
                <div class="form-group">
                  <label for="apellido" class="form-label">Apellido:</label>
                  <input type="text"  id="apellido" name="apellido" class="form-control" placeholder="Ingresa el apellido" required>
                </div>

                <div class="form-group">
                  <label for="documento" class="form-label">Documento:</label>
                  <input type="number" id="documento" name="documento" class="form-control" max="9999999999999" placeholder="Ingresa el numero de documento" required>
                </div>
                
                <div class="form-group">
                  <label for="username">Correo:</label><br>
                  <input type="email" name="correo" id="correo" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_])*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_])*[.][a-zA-Z0-9_]{1,5}" placeholder="Ingresa el correo electrónico" required>
                </div>

                <div class="form-group">
                  <label for="telefono" class="form-label">Telefono:</label>
                  <input type="number" id="telefono" name="telefono" class="form-control" max="9999999999999" placeholder="Ingresa el numero telefónico" required>
                </div>

                <div class="form-group">
                  <label for="password">Contraseña:</label><br>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Ingresa la contraseña" required>
                </div>

                <select name="rol" id="rol" class="form-control" required>
                  <option value=""disabled selected hidden>Seleccione una opción</option>
                  <option value="1">Administrador</option>
                  <option value="2">Propietario</option>
                </select>

                <br>

                <div class="mb-3">
                  <input type="submit" value="Guardar"class="btn btn-success" 
                  name="reg">
                  <a href="user.php" class="btn btn-danger">Cancelar</a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </body>
</html>