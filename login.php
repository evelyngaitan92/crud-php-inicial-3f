<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acceder a tu Cuenta</title>
  <link rel="stylesheet" href="style.css">
</head>
<?php
session_start(); //variable de sesión
if (isset($_SESSION["login"])) {
  echo "hola";
}  else {
  $_SESSION["login"] = "prueba";
}
?>
<body>
  <form action="" class= "form-usuarios">
  <input type="text" name="usuario" id="" placeholder="Ingrese el usuario">
  <input type="password" name="contraseña" id="" placeholder="Ingrese su contraseña">
  <input type="submit" value="Ingresar">
  </form>
  
</body>
</html>