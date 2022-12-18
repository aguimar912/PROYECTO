<?php

 session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: index_login.php');
  }
  require 'database.php';
  require 'funciones.php';
  require '../PROYECTO/Clases/Cliente.php';
  require '../PROYECTO/Clases/Pedido.php';

  if (!empty($_POST['correo']) && !empty($_POST['password']) && !empty($_POST['usuario'])) {
    $records = $conn->prepare('SELECT id,usuario, correo, password FROM users WHERE correo = :correo');
    $records->bindParam(':correo', $_POST['correo']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id']; //asigna en memoria el id del usuario
      $pedido = new Pedido;
    
      $_params = array(
          'cliente_dni'=>$results['id'],
          'total' => calcularTotal(),
          'fecha' => date('Y-m-d')
      );
      
      $pedido_id =  $pedido->registrar($_params);
      foreach($_SESSION['carrito'] as $indice => $value){
        $_params = array(
            "pedido_id" => $pedido_id,
            "producto_id" => $value['id'],
            "precio" => $value['precio'],
            "cantidad" => $value['cantidad'],
        );

        $pedido->registrarDetalle($_params);
    }

    $_SESSION['carrito'] = array();

    header('Location: gracias.php'); //si está todo correcto, lo redireccionamos a la pagina de inicio
    
    } else {
      $message = 'Lo sentimos, esas credenciales no coinciden';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Acceso</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Accede</h1>
    <span>o <a href="registro.php">Regístrate</a></span>

    <form action="login.php" method="POST">
    <input name="usuario" type="text" placeholder="Introduce tu DNI">
      <input name="correo" type="text" placeholder="Introduce tu email">
      <input name="password" type="password" placeholder="Entroduce tu contraseña">
      <input type="submit" value="Enviar">
    </form>
  </body>
</html>
