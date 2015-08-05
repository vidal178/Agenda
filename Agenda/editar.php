<?php
    require_once 'conexion.php';
    $conexion = conexion::conectar();
    $nombres = $_POST['txtNom'];
    $apellidos = $_POST['txtAp'];
    $fechaNac = $_POST['txtNac'];
    $email = $_POST['txtEma'];
    $fijo = $_POST['txtTel'];
    $cel = $_POST['txtCel'];
    mysqli_query($conexion, "update usuario set nombres = '$nombres', apellidos = '$apellidos', fechaNac = '$fechaNac', telefonoF = '$fijo', celular='$cel'") 
            or die("No se pudo actualizar con éxito el paciente");
    mysqli_close($conexion);
    echo 'Paciente modificado';
    echo '<a href="index.html">Regresar</a>';
?>