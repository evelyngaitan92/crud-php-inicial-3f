<head>
 <link href="style.css" rel="stylesheet">
</head>

<?php
  include ("conexion.php");
  $conexion = conexion();

  if (isset($_POST['crear-usuario'])) {
    extract($_POST);
    $query = "INSERT INTO users (nombre, apellido, edad, email, nombreusuario, contraseña) 
          VALUES ('$nombre', '$apellido', '$edad', '$email', '$nombreusuario', '$contraseña')";

    $result = mysqli_query($conexion, $query);

    if ($result) {
          Header("Location: index.php?creado=" . $nombreusuario);
    }
  }

?>

<div class= "form-usuarios"> <!--form de altas de usuario-->
    <form action="crear-usuario.php" method="POST">
      <h1>Altas de usuario</h1>
      <input type="text" name="nombre" placeholder="Ingresa tu nombre">
      <input type="text" name="apellido" placeholder="Ingresa tu apellido">
      <input type="number" name="edad" placeholder="Ingresa tu edad">
      <input type="email" name="email" placeholder="Ingresa tu e-mail">
      <input type="text" name="nombreusuario" placeholder="Ingresa tu nombre de usuario" >
      <input type="password" name="contraseña" placeholder="Crea aqui tu contraseña">

      <input type="hidden" name="crear-usuario" value="yes">
      <input type="submit" value="Crea tu usuario">
    </form>
  </div>