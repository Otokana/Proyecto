<?php


  require_once ("_db.php");


  if(isset($_POST['reg'])){

        if(strlen($_POST['nombre']) >=1 && strlen($_POST['apellido']) >=1 && strlen($_POST['documento']) >=1 && strlen($_POST['correo']) >=1 && strlen($_POST['telefono']) >=1 && strlen($_POST['password']) >=1 && strlen($_POST['rol']) >=1){

        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $documento = trim($_POST['documento']);
        $correo = trim($_POST['correo']);
        $telefono = trim($_POST['telefono']);
        $password = trim($_POST['password']);
        $password = md5($password);
        $rol = trim($_POST['rol']);
        
        $consulta= "INSERT INTO user (nombre, apellido, documento, correo, telefono, password, rol) VALUES 
        ('$nombre','$apellido','$documento','$correo','$telefono','$password', '$rol')";
       
        mysqli_query($conexion, $consulta);
        mysqli_close($conexion);

        header('Location: ../views/user.php');

        }

  }
?>