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
<head>
  <link rel="stylesheet" href="../styles/styles.css">
</head>
<br>
<h2>Lista de restaurantes</h2>
<div>
  <a class="btn btn-success" href="../views/newrestaur.php">Crear restaurante
  <i class="fa fa-plus"></i> </a>
</div>
<br>
<table class="table table-striped table-dark" id="table_id">
  <thead>    
    <tr>
      <th>Nombre</th>
      <th>NIT</th>
      <th>Direccion</th>
      <th>Telefono</th>
      <th>Logo</th>
      <th>Propietario</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $conexion=mysqli_connect("localhost","root","","r_user");        
    $SQL="SELECT restaurant.id,restaurant.r_nombre,restaurant.nit, restaurant.direccion, restaurant.r_telefono, restaurant.url, restaurant.id_propietario FROM restaurant";
    $dato = mysqli_query($conexion, $SQL);
    if($dato -> num_rows >0){
      

      while($fila=mysqli_fetch_array($dato)){  
        ?>
        <tr>
          <td> <?php echo $fila['r_nombre']; ?> </td>
          <td> <?php echo $fila['nit']; ?>    </td>
          <td> <?php echo $fila['direccion']; ?> </td>
          <td> <?php echo $fila['r_telefono']; ?> </td>
          <td> <img class="img" src="<?php echo $fila['url'] ?>" alt=""> </td>
          <td> <?php echo $fila['id_propietario']; ?> </td>
          <td>
          <a class="btn btn-warning" href="editar_restaurante.php?id=<?php echo $fila['id']?> "> 
          <i class="fa fa-edit"></i> </a>
          <a class="btn btn-danger" href="eliminar_restaurante.php?id=<?php echo $fila['id']?>">
          <i class="fa fa-trash"></i></a>
          </td>
        </tr>
        <?php
      }
    }else{
      ?>
      <tr class="text-center">
        <td colspan="16">No existen registros</td>
      </tr>
      <?php
    }
  ?>
</table>