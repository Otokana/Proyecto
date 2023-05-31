<?php
require_once "_db.php";

if (isset($_POST["accion"])) {
    switch ($_POST["accion"]) {
        //casos de registros
        case "editar_registro":
            editar_registro();
            break;

        case "editar_registrores":
            editar_registrores();
            break;

        case "editar_registroplat":
            editar_registroplat();
            break;

        case "eliminar_registro":
            eliminar_registro();
            break;

        case "eliminar_registrores":
            eliminar_registrores();
            break;

        case "eliminar_registroplat":
            eliminar_registroplat();
            break;

        case "acceso_user":
            acceso_user();
            break;
    }
}

function editar_registro()
{
    $conexion = mysqli_connect("localhost", "root", "", "r_user");
    extract($_POST);
    $consulta = "UPDATE user SET nombre = '$nombre', correo = '$correo', telefono = '$telefono',
		password ='$password', rol = '$rol' WHERE id = '$id' ";

    mysqli_query($conexion, $consulta);

    header("Location: ../views/user.php");
}

function editar_registrores()
{
    $conexion = mysqli_connect("localhost", "root", "", "r_user");
    extract($_POST);
    $id = $_POST["id"];
    $consulta = "UPDATE restaurant SET r_nombre = '$r_nombre', nit = '$nit' WHERE id = '$id' ";

    mysqli_query($conexion, $consulta);

    header("Location: ../views/user.php");
}

function editar_registroplat()
{
    $conexion = mysqli_connect("localhost", "root", "", "r_user");
    extract($_POST);
    $id = $_POST["id"];
    $consulta = "UPDATE platillos SET p_nombre = '$p_nombre', p_precio = '$p_precio', p_descripcion = '$p_descripcion', p_url_imagen = '$p_url_imagen', p_categoria = '$p_categoria' WHERE id = '$id' ";

    mysqli_query($conexion, $consulta);

    header("Location: ../views/lector.php");
}

function eliminar_registro()
{
    $conexion = mysqli_connect("localhost", "root", "", "r_user");
    extract($_POST);
    $id = $_POST["id"];
    $consulta = "DELETE FROM user WHERE id= $id";

    mysqli_query($conexion, $consulta);

    header("Location: ../views/user.php");
}

function eliminar_registrores()
{
    $conexion = mysqli_connect("localhost", "root", "", "r_user");
    extract($_POST);
    $id = $_POST["id"];
    $consulta = "DELETE FROM restaurant WHERE id= $id";

    mysqli_query($conexion, $consulta);

    header("Location: ../views/user.php");
}

function eliminar_registroplat()
{
    $conexion = mysqli_connect("localhost", "root", "", "r_user");
    extract($_POST);
    $id = $_POST["id"];
    echo 'hola';
    echo $id;
    $consulta = "DELETE FROM platillos WHERE id = $id";

    mysqli_query($conexion, $consulta);

    header("Location: ../views/lector.php");
}

function acceso_user()
{
    $nombre = $_POST["nombre"];
    $password = md5($_POST["password"]);
    session_start();
    $_SESSION["nombre"] = $nombre;

    $conexion = mysqli_connect("localhost", "root", "", "r_user");
    $consulta = "SELECT * FROM user WHERE nombre='$nombre' AND password='$password'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_fetch_array($resultado);
    $_SESSION["id"] = $filas["id"];
    $_SESSION["rol"] = $filas["rol"];

    if ($filas["rol"] == 1) {
        //admin
        
        header("Location: ../views/user.php");
    } elseif ($filas["rol"] == 2) {
        //lector
        header("Location: ../views/lector.php");
    } else {
        header("Location: login.php");
        session_destroy();
    }
}