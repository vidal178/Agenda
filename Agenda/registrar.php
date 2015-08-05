<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro de usuarios</title>
    </head>
    <body>
        <?php
            include_once 'conexion.php';
            $cedula = $_POST['txtCed'];
            $nombres = $_POST['txtNom'];
            $apellidos = $_POST['txtAp'];
            $fechaNac = $_POST['txtNac'];
            $email = $_POST['txtEma'];
            $fijo = $_POST['txtTel'];
            $cel = $_POST['txtCel'];
            $conexion = conexion::conectar();
            mysqli_query($conexion, "insert into usuario(cedula, nombres, apellidos, fechaNac, email, telefonoF, celular) values('$cedula','$nombres','$apellidos','$fechaNac','$email','$fijo','$cel')") 
                    or die("No se pudo realizar el registro ".  mysqli_error($conexion));
            mysqli_close($conexion);
            echo 'Te has registrado con éxito <br>';
            echo '<a href="index.html">Regresar</a>';
        ?>
    </body>
</html>
