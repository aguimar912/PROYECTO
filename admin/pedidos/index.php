<?php
session_start();

if(!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info'])){
	header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ComeSano</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/all.min.css">
  <style>
        #main{
        margin-top: 100px;
}
  .contenedor{
   margin-right: 40px;
  }
  .pie{
  margin-bottom: 40px;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="../panel.php">ComeSano</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="contenedor">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../pedidos/index.php">Pedidos</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="../productos/index.php">Productos</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php print $_SESSION['usuario_info']['nombre_usuario'] ?> 
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../cerrar_sesion.php">Salir</a></li>  
          </ul>
        </li>
      </ul>  
    </div>
</div>
  </div>
</nav> 





<div class="container" id="main">
    <div class="row">
          <div class="col-md-12">
             <fieldset>
              <legend>TODOS los Pedidos</legend>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Cliente</th>
                      <th>N° Pedido</th>
                      <th>Total</th>
                      <th>Fecha</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody> 
                    <?php
                     require '../../Clases/Pedido.php';
                      $pedido = new Pedido;
                      $info_pedido = $pedido->mostrar();

                    
                      $cantidad = count($info_pedido);
                      if($cantidad > 0){
                        $c=0;
                      for($x =0; $x < $cantidad; $x++){
                        $c++;
                        $item = $info_pedido[$x];
                    ?>


                    <tr>
                      <td><?php print $c?></td>
                      <td><?php print $item['nombre']?></td>
                      <td><?php print $item['id']?></td>
                      <td><?php print $item['total']?> €</td>
                      <td><?php print $item['fecha']?></td>
                       
                      <td class="text-center">
                        <a href="ver.php?id=<?php print $item['id'] ?>" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                        
                      </td>
                    
                    </tr>

                    <?php
                      }
                    }else{

                    ?>
                    <tr>
                      <td colspan="6">NO HAY REGISTROS</td>
                    </tr>

                    <?php }?>
                  
                  
                  </tbody>

                </table>
             </fieldset>
          </div>
        </div>


    </div> 
    <div class="pie"></div>

  </body>
</html>
