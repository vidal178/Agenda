<?php
    require_once 'conexion.php';
    $ced = $_POST['txtCed'];
    $conexion = conexion::conectar();
    $cons = mysqli_query($conexion, "select * from usuario where cedula = ".$ced);
    $f = mysqli_num_rows($cons);
    if($f > 0){
        mysqli_query($conexion, "delete from usuario where cedula = ".$ced) or die("No se pudo eliminar al paciente ".  mysqli_error($conexion));
        echo 'El paciente con la cedula '.$ced.' ha sido eliminado';
    }else{
        echo 'El paciente con la cedúla '.$ced.' no ha sido encontrado';
    }
    mysqli_close($conexion);
    echo '<a href="index.html">Regresar</a>';
?>