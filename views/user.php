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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <title>Usuarios</title>
  </head>
  <body>
    <div class="container is-fluid">
      <br>
      <div>
        <a class="btn btn-warning" href="../includes/_sesion/cerrarSesion.php">Cerrar sesión
        <i class="fa fa-power-off" aria-hidden="true"></i> </a>
      </div>
      <br>
      <h1>Bienvenido <?php echo $_SESSION['nombre']; ?></h1>
      <h2>Lista de usuarios</h2>
      <div>
        <a class="btn btn-success" href="../views/newuser.php">Nuevo usuario 
        <i class="fa fa-plus"></i> </a>
      </div>
      <br>
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
          require_once ("restaurante.php")
        ?>
        <br><br><br><br><br>
    </div>
  </body>
</html>