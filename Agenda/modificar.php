<?php
    require_once 'conexion.php';
    $conexion = conexion::conectar();
    $ced = $_POST['txtCed'];
    $cons = mysqli_query($conexion, "select * from usuario where cedula = ".$ced) or die("Problemas en la consulta ".  mysqli_error($conexion));
    $cant = mysqli_num_rows($cons);
    $dato = mysqli_fetch_array($cons);    
    if($cant > 0){
        $form = '<form method="POST" action="editar.php">';
        $form .= 'Cédula: <input type="text" name="txtCed" placeholder="Ingrese cedula" value="'.$dato['cedula'].'"disabled><br>';
        $form .= 'Nombres: <input type="text" name="txtNom" placeholder="Ingrese nombres" required value="'.$dato['nombres'].'"><br>';
        $form .= 'Apellidos: <input type="text" name="txtAp" placeholder="Ingrese apellidos" required value="'.$dato['apellidos'].'"><br>';
        $form .= 'Fecha de nacimiento:<input type="date" name="txtNac" required value="'.$dato['fechaNac'].'"><br>';
        $form .= 'Email: <input type="email" name="txtEma" placeholder="Ingrese Email" required value="'.$dato['email'].'"><br>';
        $form .= 'Fijo: <input type="text" name="txtTel" placeholder="Ingrese teléfono" required value="'.$dato['telefonoF'].'"><br>';
        $form .= 'Celular: <input type="text" name="txtCel" placeholder="Ingrese celular" value="'.$dato['celular'].'"><br>';
        $form .= '<input type="submit" name="reg" value="Editar paciente">';
        echo $form;
    }else{
        echo 'El paciente con cédula '.$ced.' no se encuentra';
        echo '<a href="modificar.html">Regresar</a>';
    }
    mysqli_close($conexion);
?>