<?php
session_start();
//if(empty($_SESSION["id"])){
   // header("location:login.php");
//}else
require('../config/config.php');
$query="SELECT lista,partido,Candidato, cantidadVotos, ID  FROM candidatosconcejal";
$results= $conexion->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.0.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.12.1/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.12.1/themes/smoothness/jquery-ui.css" />
</head>
<body>
    <div class="container">
        <div class="row mt- 5">
            <div class="col">
                <h1> Concejal </h1>
            </div>
        </div>
    
        <div class="row mt- 5"> 
            <div class="Col">
                <table method= "POST" class= "table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Lista</th> 
                            <th>Nombre del Partido</th>
                            <th>Candidato</th>
                            <th>Acciones</th>
                                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row= $results->fetch_assoc()){
                         ?>   
                        <tr>
                            <td><?php echo $row['lista'];?></td>
                            <td><?php echo $row['partido'];?></td>
                            <td><?php echo $row['Candidato'];?></td>
                            <td><input class='form-check-input' 
                            type='radio' name='exampleRadios' 
                            data-voto='<?php echo $row['cantidadVotos'];?>'
                            data-nombre='<?php echo $row['Candidato'];?>' 
                            value='<?php echo $row['ID'];?>' ></td>
                            
                        </tr>
                        <?php  }
                        ?>
                    </tbody>
                        
                    <script>
                        $(document).ready(function() {
                            $('input[type="radio"]').on('change', function() {
                                if($(this).is(':checked')){
                                var id = $('input[type="radio"]:checked').val();
                                var voto = $('input[type="radio"]:checked').attr('data-voto');
                                var nombre = $('input[type="radio"]:checked').attr('data-nombre');
                                var confirmacion = confirm('¿Estás seguro de que quieres hacer el voto para '+nombre +'  ?');
                                if(confirmacion) {
                                    $('input[type="radio"]').prop('disabled', true);
                                    $(this).prop('disabled', false);
                 
                                    guardar(id,voto)
                                } else { Allert('Voto cancelado');}
                            }

                        });


           
        function guardar(id,votos){
            
            $.ajax({
                url: 'http://localhost/prueba1/login/controlador/sumarvotos.php',
                type: 'GET',
                data: {id: id, vota:votos, candidatura: 'concejal'},
                success: function(response) {
                    alert("Voto sumado correctamente");
                    
                    },
                    error: function() {
                        alert("Error al guardar");
                    }
            });
        }
        
    });
                    </script>
                </table>
                
                
                <a style= "text-align: right" href="../login/login.php"  class="btn btn-danger">Salir</a>
            </div>
        </div>
    </div>    
</body>
</html>