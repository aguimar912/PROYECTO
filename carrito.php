<?php
//ACTIVAR LAS SESSIONES EN PHP
session_start();
require 'funciones.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
    
    require '../PROYECTO/Clases/Producto.php';
    $producto = new Producto;
    $resultado = $producto->mostrarPorId($id);
    
    if(!$resultado)
       header('Location: index.php');

       

    if(isset($_SESSION['carrito'])){ //SI EL CARRITO EXISTE
        //SI EL PRODUCTO EXISTE EN EL CARRITO
        if(array_key_exists($id,$_SESSION['carrito'])){ 
          //array_key_exists: Verifica si el índice o clave dada existe en el array
            actualizarProducto($id);
        }else{
            //  SI EL CARRITO NO EXISTE EN EL CARRITO
            agregarProducto($resultado, $id);
        }

    }else{
        //  SI EL CARRITO NO EXISTE
        agregarProducto($resultado, $id);

    }

   

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
    <link rel="stylesheet" href="css/all.min.css">
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
    <br><br><br><br>
  


    <div class="container">
            <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Producto</th>
                      <th>Foto</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                      <th>Total</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
                            $c=0;
                            foreach($_SESSION['carrito'] as $indice => $value){
                                $c++;
                                $total = $value['precio'] * $value['cantidad'];
                      ?>
                        <tr>
                            <form action="actualizar_carrito.php" method="post">
                                <td><?php print $c ?></td>
                                <td><?php print $value['titulo']  ?></td>
                                <td>
                                    <?php
                                        $foto = 'imagenesProductos/'.$value['foto'];
                                        if(file_exists($foto)){
                                        ?>
                                        <img src="<?php print $foto; ?>" width="35">
                                    <?php }?>
                                     
                                </td>
                                <td><?php print $value['precio']  ?>€</td>
                                <td>
                                <input type="hidden" name="id"  value="<?php print $value['id'] ?>">
                                    <input type="text" name="cantidad" size="1" class="form-control" value="<?php print $value['cantidad'] ?>"> 
                                </td>
                                <td>
                                    <?php print $total  ?> €
                                </td>
                                <td>





<button type="submit" class="btn btn-success btn-xs"> 
<i class="fa-solid fa-rotate"></i>
</button>

<a href="eliminar_carrito.php?id=<?php print $value['id']  ?>" class="btn btn-danger btn-xs">
<i class="fa-solid fa-trash-can"></i>
</a>


                                </td>
                            </form>
                        </tr>

                    <?php
                        }
                        }else{
                    ?>
                        <tr>
                            <td colspan="7">NO HAY PRODUCTOS EN EL CARRITO</td>

                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
                <tfoot>
                        <tr>
                            <td colspan="5"  class="text-end">Total</td>
                            <td><?php print calcularTotal(); ?> €</td>
                            <td></td>
                        </tr>

                </tfoot>
            </table>
            <hr>
            <?php
                if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
            ?>  
            <div class="row">
                    <div class="text-start">
                        <a href="productos.php" class="btn btn-success">Seguir Comprando</a>
                    </div>
                    <div class="text-end">
                        <a href="index_login.php" class="btn btn-success">Finalizar Compra</a>
                    </div>
            </div>

           
             
            <?php
                }
            ?>

    </div> 
  </body>
</html>