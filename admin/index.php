<?php
session_start();
require '../funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ComeSano</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
     #main{
        margin-top: 200px;
}
      .main-login{
	max-width: 300px;
	margin: 0 auto;
}
  </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container">
            <div>
                <a href="index.php" class="navbar-brand">ComeSano</a>
            </div>
            <div  >
            
            </div>  
        </div>
    </nav>
    
<div class="container" id="main">
    <div class="main-login">
    <form action="login.php" method="post">
        <div class="p-3 border bg-light">
          <h3 class="text-center">ACCESO AL PANEL</h3>
            <div class="form-group">
                <label>Usuario</label>
                <input type="text" class="form-control" name="nombre_usuario" placeholder="Usuario" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="clave" placeholder="Password" required>
            </div> <br>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-dark">INICIAR SESIÓN</button>
            </div>
        </div>
    </form>
    </div>

</div>
</body>
</html>