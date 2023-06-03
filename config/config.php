<?php
$host= "localhost";
$user= "root";
$password= "";
$db="prueba";

$conexion = new mysqli($host, $user, $password, $db);

if ($conexion->connect_errno){
    echo "falló la conexión a la base de datos". $conexion->connect_error;
}
?>

