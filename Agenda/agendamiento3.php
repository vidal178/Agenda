<?php
    require_once 'conexion.php';
    $conexion = conexion::conectar();
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    mysqli_query($conexion, "insert into agendamiento(fecha,hora,estado) values('$fecha','$hora', 1)") or die("No se pudo hacer el registro ".  mysqli_error($conexion));
    mysqli_close($conexion);
    echo 'Cita registrado con éxito<br>';
    echo '<a href="index.html">Regresar</a>';

