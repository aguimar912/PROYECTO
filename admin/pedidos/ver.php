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
    <style>
  .contenedor{
   margin-right: 40px;
  }
  .pie{
  margin-bottom: 40px;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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

<br><br><br><br>

<div class="container">
    <div class="row">
          <div class="col-md-12">
            <fieldset>
                <?php
                     require '../../Clases/Pedido.php';
                    $id = $_GET['id'];
                    $pedido = new Pedido;

                    $info_pedido = $pedido->mostrarPorId($id);

                    $info_detalle_pedido = $pedido->mostrarDetallePorIdPedido($id);
                    $_SESSION['nombre'] = $info_pedido['nombre'];
                    $_SESSION['correo'] = $info_pedido['correo'];
                    $_SESSION['fecha' ] = $info_pedido['fecha'];
                    $_SESSION['total' ] = $info_pedido['total'];
                ?>


                <legend>Información de la Compra</legend>
                <div class="form-group">
                    <label>Nombre</label>
                    <input value="<?php print $info_pedido['nombre']?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input value="<?php print $info_pedido['correo'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Fecha</label>
                    <input value="<?php print $info_pedido['fecha'] ?>" type="text" class="form-control" readonly>
                </div>
               


                <hr>
                    Productos Comprados
                <hr>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Titulo</th>
                      <th>Foto</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                      <th>
                          Total
                      </th>
                    </tr>
                  </thead>
                  <tbody> 
                    <?php
                   
                    
                      $cantidad = count($info_detalle_pedido);
                      if($cantidad > 0){
                        $c=0;
                      for($x =0; $x < $cantidad; $x++){
                        $c++;
                        $item = $info_detalle_pedido[$x];
                        $total = $item['precio'] * $item['cantidad'];
                    ?>


                    <tr>
                      <td><?php print $c?></td>
                      <td><?php print $item['titulo']?></td>
                      <td>
                      <?php
                          $foto = '../../imagenesProductos/'.$item['foto'];
                          if(file_exists($foto)){
                        ?>
                          <img src="<?php print $foto; ?>" width="35">
                      <?php }else{?>
                          SIN FOTO
                      <?php }?>
                      </td>
                      <td><?php print $item['precio']?> €</td>
                      <td><?php print $item['cantidad']?></td>
                    <td>
                    <?php print $total?>
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
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Total Compra</label>
                        <input value="<?php print $info_pedido['total'] ?>" type="text" class="form-control" readonly>
                    </div>
                </div>
                
            </fieldset>
            <div class="pull-left">
                <a href="../panel.php" class="btn btn-default hidden-print">Cancelar</a>
	<!-- hidden-print es para que no salga el botón a la hora de imprimir la factura -->
            </div>

            <div class="pull-right">
                <a href="factura.php?id=<?php print $item['id'] ?>" id="btnImprimir" class="btn btn-danger hidden-print">Imprimir</a>
             
              </div>

            
             
          </div>
        </div>


    </div>
    <script>
        // $('#btnImprimir').on('click',function(){

        //     window.print();

        //     return false;

        // })
                        
    </script>
<div class="pie"></div>
  </body>
</html>
