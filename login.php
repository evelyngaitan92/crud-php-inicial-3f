<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acceder a tu Cuenta</title>
  <link rel="stylesheet" href="style.css">
</head>

<?php
if (isset($_POST['login'])) {
  //ini_set('display_errors',1);
  include 'conexion.php';

  $conexion = conexion();
   
  extract($_POST);
 
  $query= "SELECT * FROM users
            WHERE nombreusuario = '$nombreusuario' 
            AND contraseña = '$contraseña'"; 

  $result = mysqli_query($conexion, $query);
  $login_data = mysqli_fetch_array($result);	
  
  if ($login_data) {
    session_name('back');
    session_start();
    $_SESSION['usuario_nombreusuario'] = $login_data['nombreusuario'];	
    $_SESSION['usuario_id'] = $login_data['id'];
    $_SESSION['usuario_nombre'] = $login_data['nombre'];
    $_SESSION['is_logged'] = 1;

    header ('location: index.php');
      //echo "conecto";
    exit();
  } else {
    header('location: login.php?mensaje=USUARIO O CONTRASERA INCORRECTOS INTENTE NUEVAMENTE');

    // echo "NO conecto";
  }  

}

?>
  <body>
    <?php if (isset($_GET['mensaje'])) { ?>
      <span><?= $_GET['mensaje'] ?></span>
    <?php } ?>
    <h1>Ingresa tu Usuario y contraseña</h1>
      <form action="login.php" class= "formularios" method="POST" class= "formularios">
        <input type="text" name="nombreusuario" id="" placeholder="Ingrese el usuario">
        <input type="password" name="contraseña" id="" placeholder="Ingrese su contraseña">
        <input type="submit" value="Ingresar" class="boton">
        <input type="hidden" name="login" value="yes">
      </form>
    <div>
      <p>Si aun no estas registrado crea un usuario para acceder 
        <a href="crear-usuario.php"> 
          <button class="boton">Crea tu usuario</button></a>
      </p>
    </div>
      
    
  </body>
</html>