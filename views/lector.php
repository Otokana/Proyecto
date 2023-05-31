<?php
  session_start();
  error_reporting(0);
  $validar = $_SESSION['nombre'];
  if( $validar == null || $validar = ''){
    header("Location: ../includes/login.php");
    die();
  }
  $p_id = $_SESSION['id'];
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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../styles/styles.css" rel="stylesheet">
    <title>Propietarios</title>
  </head>
  <body>
    <div class="container is-fluid">
    <br><br>
    <div>
      <a class="btn btn-warning" href="../includes/_sesion/cerrarSesion.php">Log Out
      <i class="fa fa-power-off" aria-hidden="true"></i></a>
    </div>
    <h1>Bienvenido <?php echo $_SESSION['nombre']; ?></h1>
    <br>
    <h2>Lista de empleados</h2>
    <a class="btn btn-success" href="newempleado.php">Nuevo empleado
    <i class="fa fa-plus"></i> </a>
    <br><br>
    <table class="table table-striped table-dark" id= "table_id">               
      <thead>    
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Documento</th>
          <th>Correo</th>
          <th>Telefono</th>
          <th>Rol</th>
          <th>Acciones</th>  
        </tr>
      </thead>
      <tbody>
        <?php
          $conexion=mysqli_connect("localhost","root","","r_user");               
          $SQL="SELECT user.id, user.nombre, user.apellido, user.documento, user.correo, user.password, user.telefono, permisos.rol FROM user LEFT JOIN permisos ON user.rol = permisos.id";
          $dato = mysqli_query($conexion, $SQL);
          
          if($dato -> num_rows >0){
              while($fila=mysqli_fetch_array($dato)){
          ?>
          <tr>
          <td><?php echo $fila['nombre']; ?></td>
          <td><?php echo $fila['apellido']; ?></td>
          <td><?php echo $fila['documento']; ?></td>
          <td><?php echo $fila['correo']; ?></td>
          <td><?php echo $fila['telefono']; ?></td>
          <td><?php echo $fila['rol']; ?></td>

          <td>

          <a class="btn btn-warning" href="editar_user.php?id=<?php echo $fila['id']?> ">
          <i class="fa fa-edit"></i> </a>

            <a class="btn btn-danger" href="eliminar_user.php?id=<?php echo $fila['id']?>">
          <i class="fa fa-trash"></i></a>

          </td>
          </tr>
          <?php
          }
          }else{
              ?>
              <tr class="text -center">
              <td colspan="16">No existen registros</td>
              </tr>
              <?php
          }
          ?>
    </table>

    <?php
    require_once("platillo.php");
    ?>
    <br><br><br>
  </body>
</html>