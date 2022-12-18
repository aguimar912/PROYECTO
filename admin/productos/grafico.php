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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" href="../../css/all.min.css">
    <script type="text/javascript">
            function drawChart() {
                // call ajax function to get sports data
                var jsonData = $.ajax({
                    url: "getData.php",
                    dataType: "json",
                    async: false
                }).responseText;
                //The DataTable object is used to hold the data passed into a visualization.
                var data = new google.visualization.DataTable(jsonData);

                // To render the pie chart.
                var chart = new google.visualization.PieChart(document.getElementById('chart_container'));
                chart.draw(data, {width: 800, height: 500});
            }
            // load the visualization api
            google.charts.load('current', {'packages':['corechart']});

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart);
        </script>
        <style>
            #enlace{
                text-decoration:none;
                margin-left: 900px;
             
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
        <a class="nav-link active" aria-current="page" href="index.php">Productos</a>
        </li>
      
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php  print $_SESSION['usuario_info']['nombre_usuario'] ?> 
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
<a id="enlace" href="index.php" class="btn btn-primary">Volver</a>

<div id="chart_container"></div>



</body>
</html>