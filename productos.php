<?php
session_start();
require 'funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ComeSano</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
</head>
<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container">
            <div>
                <a href="index.php" class="navbar-brand">ComeSano</a>
            </div>
            <div  >
                <ul class="navbar-nav">
                    <li>
                        <a href="carrito.php" class="navbar-brand">CARRITO <span class=" top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php print cantidadProductos(); ?></span></a>
                    </li>
                </ul>
            </div>  
        </div>
    </nav>
    
<br> <br> <br>
    <div class="container ">
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
        <?php
               require '../PROYECTO/Clases/Producto.php';
              $producto = new Producto;
              $info_productos = $producto->mostrar();
              $cantidad = count($info_productos);
              if($cantidad > 0){
                for($x =0; $x < $cantidad; $x++){
                  $item = $info_productos[$x];
            ?>
            <div class="col">
                <div class="p-3 border bg-light">
                    <div>
                        <h2 class="text-center"><?php print $item['titulo'] ?></h2>
                    </div>
                    <div>
                    <?php
                          $foto = 'imagenesProductos/'.$item['foto'];
                          if(file_exists($foto)){
                        ?>
                         <img src="<?php print $foto; ?>" class="card-img-top">
                         <?php }else{?>
                        <img src="Productos/not-found.jpg">
                      <?php }?>
                        </div> <br>
                        <div class="d-grid gap-2">
  <a href="carrito.php?id=<?php print $item['id'] ?>"  class="btn btn-success btn-block">  
                        <span></span> Comprar
                        </a> 
</div>
                </div>
            </div>

            <?php
                }
            }else{?>
              <h4>NO HAY REGISTROS</h4>

          <?php }?> 
        </div>
    </div>
</body>
</html>