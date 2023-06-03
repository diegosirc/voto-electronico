<?php
require('../config/config.php');
?>
<html>
  <head>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Candidato', 'cantidad de Votos'],
         <?php
            $SQL = "SELECT candidato, cantidadVotos FROM candidatosgobernador";
            $consulta =mysqli_query($conexion,$SQL);
            while ($resultado= mysqli_fetch_assoc($consulta)){
                echo "['" .$resultado['candidato']."', " .$resultado['cantidadVotos']."],";
                
            }

         ?>
        ]);

        var options = {
          title: 'Resultados de Gobernador'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
      
    </script>
      
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  </head>
  <body>
      
    <div id="piechart" style="width: 900px; height: 500px;"> </div>
       <div class="d-flex justify-content-center">
      <div class="p-2"><a style= "text-align: right" href="indexadmin2.php"   class="btn btn-secondary">Siguiente</a></div>
      <div class="p-2"><a style= "text-align: right" href="../login/login.php"  class="btn btn-danger">Salir</a> </div>
      
        </div>
      
  
      
      
  </body>
</html>
