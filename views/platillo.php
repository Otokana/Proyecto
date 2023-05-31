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
?>
<h2>Lista de platillos</h2>
  <a class="btn btn-success" href="newplat.php">Nuevo platillo
    
    <i class="fa fa-plus"></i> </a>
    <br>
  
    <br>
    <table class="table table-striped table-dark" id="table_id">
      <thead>    
        <tr>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Descripción</th>
          <th>Imagen</th>
          <th>Categoria</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $conexion=mysqli_connect("localhost","root","","r_user");        
          $SQL="SELECT platillos.id, platillos.propietario_id, platillos.p_nombre, platillos.p_precio, platillos.p_descripcion, platillos.p_url_imagen, platillos.p_categoria FROM platillos WHERE propietario_id = $p_id";
          $dato = mysqli_query($conexion, $SQL);
          if($dato -> num_rows >0){
            while($fila=mysqli_fetch_array($dato)){  
              ?>
              <tr>
                <td> <?php echo $fila['p_nombre']; ?> </td>
                <td> <?php echo $fila['p_precio']; ?>    </td>
                <td> <?php echo $fila['p_descripcion']; ?> </td>
                <td> <img class="img" src="<?php echo $fila['p_url_imagen'] ?>" alt=""> </td>
                <td> <?php echo $fila['p_categoria']; ?> </td>
                <td>

                  <a class="btn btn-warning" href="editar_platillo.php?id=<?php echo $fila['id']?> ">
                  <i class="fa fa-edit"></i> </a>

                  <a class="btn btn-danger" href="eliminar_platillo.php?id=<?php echo $fila['id']?>">
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