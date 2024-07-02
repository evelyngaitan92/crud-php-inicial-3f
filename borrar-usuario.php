<?php
  include ("conexion.php");
  $conexion = conexion();

  session_name('back');
  session_start();
  
  if ($_SESSION['usuario_id']== $id){
    Header("Location: index.php?mensaje=No se puede eliminar el usuario" . $id);

  } else if (isset($_POST['borrar-usuario'])) {
    extract($_POST);

    $query = "DELETE FROM `users` WHERE id = $id";

    $result = mysqli_query($conexion, $query);
    Header("Location: index.php?borrado=" . $id);
  }
?>