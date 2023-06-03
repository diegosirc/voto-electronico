<?php
session_start();
require ('../config/config.php');
if (!empty($_POST["btningresar"])){
    if(!empty($_POST["correo"]) and !empty($_POST["password"])){
        $correo=$_POST["correo"];
        $password=$_POST["password"];
        $sql=$conexion->query("select *  from usuarios where correo='$correo' and password='$password' ");
        if($datos=$sql->fetch_object()){
            $_SESSION["id"]=$datos->id;
            $_SESSION["correo"]=$datos->correo;
            $_SESSION["nombre"]=$datos->nombre;
            $_SESSION["rol_id"]=$datos->rol_id;

            if($datos->rol_id==1){
                header("location:http://localhost/prueba1/indexadmin/indexadmin1.php");
            }else{
                header("location:http://localhost/prueba1/indexusuario/index.php");}
            
        }else{
            echo"<div class= 'alert alert-danger'>Acceso denegado</div>";
        }
    }else{
        echo "campos vacios";
    }
}
?>