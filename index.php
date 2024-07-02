<?php //validación de usuario 
  session_name('back');
  session_start();

  if (!isset($_SESSION['is_logged'])) {
    header('location: login.php');
    exit();
  } 

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="style.css" rel="stylesheet">
  <title>Crud Proyecto Tecno3f</title>
</head>

<body>
  <span>Hola, <?=  $_SESSION['usuario_nombre'] ?></span>
  <a href="logout.php"><button class="boton">Cerrar Sesión</button></a>
  <div class= "tabla-usuarios">
    <h1 id="titulo-index">Usuarios Registrados</h1>
    <table>
      <thead>
        <tr>
          <th>ID</th> <!--Id de la base de datos-->
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Edad</th>
          <th>Email</th>
          <th>Nombre de usuario</th>
          <th>Password</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody> 
        
      <?php 
        include("conexion.php");
        $conexion = conexion();
        $query = "SELECT * FROM users";
        $results = mysqli_query($conexion, $query);
      ?>
      <?php while($row= mysqli_fetch_array($results)):?>
       <tr> 
        <td><?= $row['ID'] ?></td>
        <td><?= $row['nombre'] ?></td>
        <td><?= $row['apellido'] ?></td>
        <td><?= $row['edad'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['nombreusuario'] ?></td>
        <td><?= $row['contraseña'] ?></td>

        <td>
         <form action="modificar-usuario.php" method="POST">
            <input type="hidden" name="id" value="<?= $row['ID'] ?>">
            <input type="submit" value="Modificar" class="boton">
          </form>  
        <td>
          <form action="borrar-usuario.php" method="POST">
            <input type="hidden" name="borrar-usuario" value="yes">
            <input type="hidden" name="id" value="<?= $row['ID'] ?>">
            <input type="submit" value="Borrar" class="boton">
          </form>  
        </td>
       </tr>
      <?php endwhile; ?>
    </tbody> 
    </table>
  </div>
  <div>
    <a href="crear-usuario.php"> <button class="boton" >Crear Usuario</button></a>
  </div>
      <?php if (isset($_GET['borrado'])) { ?>
        <span>USUARIO BORRADO EXITOSAMENTE</span>
      <?php } ?>
      <?php if (isset($_GET['creado'])) { ?>
        <span>USUARIO CREADO EXITOSAMENTE</span>
      <?php } ?>
      <?php if (isset($_GET['modificado'])) { ?>
        <span>USUARIO MODIFICADO EXITOSAMENTE</span>
      <?php } ?>
</body>

</html>