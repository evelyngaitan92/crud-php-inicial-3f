<?php
  include ("conexion.php");
  $conexion = conexion();

  if (isset($_POST['crear-usuario'])) {
    extract($_POST);
    $query = "INSERT INTO users (nombre, apellido, edad, email, nombreusuario, contraseña) 
          VALUES ('$nombre', '$apellido', '$edad', '$email', '$nombreusuario', '$contraseña')";

    $result = mysqli_query($conexion, $query);
  }

  if ($result) {
    echo "Usuario creado..." . $result;
  } else {
    Header("Location: index.php");
  }
?>