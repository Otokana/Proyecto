<?php

require_once ("_db.php");
  session_start();
  $p_id = $_SESSION['id'];

  echo $p_id;
if(isset($_POST['registrar'])){
      if(strlen($_POST['p_nombre']) >=1 && strlen($_POST['p_precio']) >=1 && strlen($_POST['p_descripcion']) && strlen($_POST['p_url_imagen']) >=1 && strlen($_POST['p_categoria']) >=1){

      echo $p_id;
      $p_nombre = trim($_POST["p_nombre"]);
      $p_precio = trim($_POST["p_precio"]);
      $p_descripcion = trim($_POST["p_descripcion"]);
      $p_intento = '../sources/';
      $p_url_imagen = trim($_POST["p_url_imagen"]);
      $p_categoria = trim($_POST["p_categoria"]);


      $consulta= "INSERT INTO platillos (propietario_id, p_nombre, p_precio, p_descripcion, p_url_imagen, p_categoria)
      VALUES ('$p_id', '$p_nombre', '$p_precio', '$p_descripcion', '$p_url_imagen' , '$p_categoria')";

      mysqli_query($conexion, $consulta);
      mysqli_close($conexion);

      header('Location: ../views/lector.php');
    }
}
?>