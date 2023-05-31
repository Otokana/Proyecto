<?php

require_once ("_db.php");

if(isset($_POST['registrar'])){
      if(strlen($_POST['r_nombre']) >=1 && strlen($_POST['nit']) >=1 && strlen($_POST['direccion']) >=1 && strlen($_POST['r_telefono']) >=1 && strlen($_POST['url']) >=1 && strlen($_POST['id_propietario']) >=1){


      
      $r_nombre = trim($_POST['r_nombre']);
      $nit = trim($_POST['nit']);
      $direccion = trim($_POST['direccion']);
      $r_telefono = trim($_POST['r_telefono']);
      $intento ='../sources/';
      $url = trim($_POST['url']);
      $url1 = $intento . $url; 
      $id_propietario = trim($_POST['id_propietario']);



      $consulta= "INSERT INTO restaurant (r_nombre, nit, direccion, r_telefono, url, id_propietario)
      VALUES ('$r_nombre', '$nit', '$direccion', '$r_telefono', '$url1', '$id_propietario')";

      mysqli_query($conexion, $consulta);
      mysqli_close($conexion);

      header('Location: ../views/user.php');
    }
  }
?>