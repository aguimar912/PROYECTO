<?php
session_start();

ob_start();
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
<div class="container">
    <div class="row">
          <div class="col-md-12">
            <fieldset>
                <?php
                // $mysqli = new mysqli("localhost", "root", "", "proyecto");
                // $consulta = "SELECT * FROM productos";
                // $resultado = $mysqli->query($consulta);
                     require 'Pedido.php';
                   $id = $_GET['id'];
                  // $id = 15;
                    $pedido = new Pedido;

                    $info_pedido = $pedido->mostrarPorId($id);

                    $info_detalle_pedido = $pedido->mostrarDetallePorIdPedido($id);

                ?>


                <legend>Información de la Compra</legend>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Nombre</label>
                    <input value="<?php print $_SESSION['nombre'] ?>" type="text" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Email</label>
                    <input value="<?php print $_SESSION['correo'] ?>" type="text" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Fecha</label>
                    <input value="<?php print $_SESSION['fecha'] ?>" type="text" class="form-control" readonly>
                </div>
            </div>
                </table>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Total Compra</label>
                        <input value="<?php print $_SESSION['total'] ?>" type="text" class="form-control" readonly>
                    </div>
                </div>
                
            </fieldset>
          </div>
        </div>
    </div>
<div class="pie"></div>
  </body>
</html>
<?php
$html=ob_get_clean();
//echo $html;

require_once 'autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
//$dompdf->loadHtml("hola");

$dompdf->setPaper('letter');

$dompdf->render();

$dompdf->stream("archivo_.pdf", array("Attachment" => false));

?>