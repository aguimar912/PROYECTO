<?php
  session_start();
  require 'funciones.php';//?
  require 'database.php';

  if (isset($_SESSION['user_id'])) { //si el usuario está logueado:
    $records = $conn->prepare('SELECT id, usuario, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results; //almacenamos los datos en la variable user
    }
  }
?>

<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <title>Bienvenido a tu WebApp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): //si el usuario está logueado: ?>
      <br> Bienvenido. <?= $user['email']; ?>
      <br>Has iniciado sesión correctamente
      <a href="logout.php">
        Cerrar sesión
      </a>
    <?php else: //si no está logueado: ?>
      <h1>Por favor inicia sesión o regístrate</h1>

      <a href="login.php">Iniciar sesión</a> <br>
      <a href="registro.php">Registrarse</a>
    <?php endif; ?>
  </body>
</html>
