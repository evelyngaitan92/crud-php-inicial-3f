<head>
  <link href="style.css" rel="stylesheet">
</head>
<?php
    include ("conexion.php");
    $conexion = conexion();

    extract($_POST);

    if (isset($_POST['modificar-usuario'])) {
      
      $query = "UPDATE users
        SET  
          nombre='$nombre', 
          apellido='$apellido', 
          email='$email', 
          edad='$edad',
          contraseña= '$contraseña'
        WHERE
          id= $id";
  
        $result = mysqli_query($conexion, $query);
        
        Header("Location: index.php?modificado=" . $nombreusuario);
    } else {  
      $query = "SELECT
          nombre,
          apellido,
          email,
          edad,
          nombreusuario,
          contraseña
        FROM users
        WHERE id = $id";
      $results = mysqli_query($conexion, $query);
      $row = mysqli_fetch_array($results);
      extract($row);
    }
    ?>

    <div class= "form-usuarios"> <!--form de altas de usuario-->
        <form action="modificar-usuario.php" method="POST">
          <h1>Modicar datos de usuario</h1>
          <input type="text" name="nombre" placeholder="Ingresa tu nombre" value="<?= $nombre?>">
          <input type="text" name="apellido" placeholder="Ingresa tu apellido"  value="<?= $apellido?>">
          <input type="number" name="edad" placeholder="Ingresa tu edad"  value="<?= $edad?>">
          <input type="email" name="email" placeholder="Ingresa tu e-mail"  value="<?= $email?>">
          <input type="text" disabled placeholder="Ingresa tu nombre de usuario" value="<?= $nombreusuario?>">
          <input type="password" name="contraseña" placeholder="Crea aqui tu contraseña" value="<?= $contraseña?>">

          <input type="hidden" name="nombreusuario" value="<?= $nombreusuario?>">
          <input type="hidden" name="id" value="<?= $id?>">
          <input type="hidden" name="modificar-usuario" value="yes">
          <input type="submit" value="Modificar usuario">
        </form>
      </div>