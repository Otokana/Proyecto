<?php
  session_start();
  error_reporting(0);
  $validar = $_SESSION["nombre"];
  if ($validar == null || $validar == "") {
     header("Location: ./includes/login.php");
      die();
  }
  $autorizacion = $_SESSION["rol"];
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
    <title>Registro de restaurantes</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  </head>
  <body id="page-top">
    <form  action="../includes/vrestaur.php" method="POST">
      <div id="login" >
        <div class="container">
          <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
              <div id="login-box" class="col-md-12">
                <br><br><br>
                <h3 class="text-center" >Registro de nuevo restaurante</h3>

                <div class="form-group">
                  <label for="r_nombre" class="form-label">Nombre:</label>
                  <input type="text" id="r_nombre" name="r_nombre" class="form-control" placeholder="Ingresa el nombre de la empresa" pattern="^[a-zA-Z]+[a-zA-Z0-9]*$" required>
                </div>

                <div class="form-group">
                  <label for="nit">NIT:</label><br>
                  <input type="number" name="nit" id="nit" class="form-control" placeholder="Ingresa el NIT de la empresa" required>
                </div>

                <div class="form-group">
                  <label for="direccion" class="form-label">Dirección:</label>
                  <input type="text"  id="direccion" name="direccion" class="form-control" placeholder="Ingresa la direccion" required>
                </div>

                <div class="form-group">
                  <label for="r_telefono" class="form-label">Telefono del restaurante:</label>
                  <input type="number" id="r_telefono" name="r_telefono" class="form-control" max="9999999999999" placeholder="Ingresa el número telefónico" required>
                </div>

                <div class="form-group">
                  <label for="url" class="form-label">Logo:</label>
                  <input type="file"  id="url" name="url" class="form-control" placeholder="Ingresa el url" required>
                </div>

                <div class="form-group">
                  <label for="id_propietario">Propietario:</label><br>
                  <select name="id_propietario" id="id_propietario" class="form-control" required>
                    <option value=""disabled selected hidden>Seleccione una opción</option>
                    <?php
                    include '../includes/_db.php';
                    $sql = "SELECT nombre, id FROM user WHERE rol=2";
                    $result = mysqli_query($conexion, $sql);
                    if (!$result) {
                        die("Error fetching data: " . mysqli_error($conexion));
                    }
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                    }
                    mysqli_close($conexion);
                    ?>
                  </select>
                </div>
                <br>

                <div class="mb-3">
                  <input type="submit" value="Guardar"class="btn btn-success" 
                  name="registrar">
                  <a href="./user.php" class="btn btn-danger">Cancelar</a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </body>
</html>