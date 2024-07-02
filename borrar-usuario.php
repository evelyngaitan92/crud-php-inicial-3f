<?php
  include ("conexion.php");
  $conexion = conexion();

  if (isset($_POST['borrar-usuario'])) {
    extract($_POST);
    $query = "DELETE FROM `users` WHERE id = $id";

    $result = mysqli_query($conexion, $query);
  }

  // if ($result) {
  //   echo "Usuario borrado - ID: " . $id;
  // } else {
    Header("Location: index.php?borrado=" . $nombreusuario);
  // }
?>