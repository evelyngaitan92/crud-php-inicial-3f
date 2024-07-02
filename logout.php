<?php
  session_name('back');
  session_start();
  session_unset();
  session_destroy();

  header('location: login.php?mensaje=SE HA DESCONECTADO DEL SISTEMA');

?>