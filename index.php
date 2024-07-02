<!--Coneccion con la BD exemplo
include("connection.php");
$con = connection();

$sql = "SELECT * FROM users";
$query = mysqli_query($con, $sql);
-->
 <?php 
include("conexion.php");
$conexion= conexion();
$db= "select * from users";
$query= mysqli_query($conexion, $db);
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

  <?php if (isset($_GET['borrado'])) { ?>
    <span>USUARIO BORRADO: <?= $_GET['borrado'] ?></span>
  <?php } ?>

  <div class= "tabla-usuarios">
    <h2>Usuarios Registrados</h2>
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
      <?php while($row= mysqli_fetch_array($query)):?>
       <tr> 
        <td><?= $row['ID'] ?></td>
        <td><?= $row['nombre'] ?></td>
        <td><?= $row['apellido'] ?></td>
        <td><?= $row['edad'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['nombreusuario'] ?></td>
        <td><?= $row['contraseña'] ?></td>

        <td><a href="modificaciones.php">Editar</a></td>
        <td>
          <form action="borrar-usuario.php" method="POST">
            <input type="hidden" name="borrar-usuario" value="yes">
            <input type="hidden" name="id" value="<?= $row['ID'] ?>">
            <input type="submit" value="Borrar">
          </form>  
        </td>
       </tr>
      <?php endwhile; ?>
    </tbody> 
    </table>
  </div>
</body>

</html>