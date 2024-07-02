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

<!--form de altas de usuario-->
    <form action="crear-usuario.php" method="POST" class= "formularios">
      <h1>Altas de usuario</h1>
      <input type="text" name="nombre" placeholder="Ingresa tu nombre" required>
      <input type="text" name="apellido" placeholder="Ingresa tu apellido" required>
      <input type="number" name="edad" placeholder="Ingresa tu edad" required>
      <input type="email" name="email" placeholder="Ingresa tu e-mail" required>
      <input type="text" name="nombreusuario" placeholder="Ingresa tu nombre de usuario" required>
      <input type="password" name="contraseña" placeholder="Crea aqui tu contraseña" required>
      <input type="hidden" name="crear-usuario" value="yes">
      <input type="submit" value="Crea tu usuario">
    </form>
    <a href="index.php"><button>Volver al Inicio</button></a>
 