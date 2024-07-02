<?php
function conexion()
{
  $servidor = "127.0.0.1:3307";
  $usuario = "root";
  $contrasena = "";
  $basededatos = "usuarios-crud-php";

  $conexion = mysqli_connect($servidor, $usuario, $contrasena)
    or die("No se conecto al servidor");

  $db = mysqli_select_db($conexion, $basededatos)
    or die("No se conecto a la base");

  return $conexion;
}

?>