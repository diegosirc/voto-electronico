<?php

$host= "localhost";
$user= "root";
$password= "";
$db="prueba";

$conexion = new mysqli($host, $user, $password, $db);

if ($conexion->connect_errno){
    echo "falló la conexión a la base de datos". $conexion->connect_error;
}


$id = $_GET['id'];
  $voto = intval($_GET['vota']);
  $candidatura = $_GET ['candidatura'];
  $total= $voto + 1;
 
 switch ($candidatura) {
    case 'gobernador':
        
        $sql = "UPDATE candidatosgobernador SET cantidadVotos=".$total." WHERE  `id`=".$id.";";
           break;
        
        case 'legislador':
            $sql = "UPDATE candidatoslegislador SET cantidadVotos=".$total." WHERE  `id`=".$id.";";
            break;
            case 'intendentes':
                $sql = "UPDATE candidatosintendentes SET cantidadVotos=".$total." WHERE  `id`=".$id.";";
                break;
                case 'concejal':
                    $sql = "UPDATE candidatosconcejal SET cantidadVotos=".$total." WHERE  `id`=".$id.";";
                    break;
                    case 'estado':
                        $sql = "UPDATE usuarios SET estado=1 WHERE  `ID`=".$id.";";
                        break;
    default:
        # code...
        break;
 }
    $stmt = $conexion->prepare($sql);
    
    if ($stmt->execute()) { echo 'ok';}else{echo'error';}

?>