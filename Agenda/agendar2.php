<?php
require_once 'conexion.php';
$conexion = conexion::conectar();
$fechaF = $_POST['txtFF'];
$fechaI = $_POST['txtFI'];
$fecha_act = date("d/m/y");
echo $fecha_act.'<br>';
$ced = $_POST['txtCed'];
$nom = $_POST['txtNom'];
$horaI = $_POST['txtHI'];
$horaF = $_POST['txtHF'];
if($_POST['duracion'] == "5"){
$duracion = 5;
}else if($_POST['duracion'] == "10"){
$duracion = 10;
}else if($_POST['duracion'] == "15"){
$duracion = 15;
}else if($_POST['duracion'] == "30"){
$duracion = 30;
}else if($_POST['duracion'] == "60"){
$duracion = 60;
}
mysqli_query($conexion, "insert into agendamedico(cedula,nombre,fechaI, fechaF, horaI, horaF, duracion) values ('$ced','$nom','$fechaI', '$fechaF', '$horaI', '$horaF','$duracion')")
or die("No se pudo realizar la agenda con éxito ". mysqli_error($conexion));
mysqli_close($conexion);
echo 'Agenda generada con éxito';
echo '<a href="index.html">Regresar</a>';


