<!DOCTYPE html>
<html>
    <head>
        <title>Citas</title>
    </head>
    <body>
        <?php
        require_once 'conexion.php';
        $conexion = conexion::conectar();
        $ced = $_POST['txtCed'];
        //echo $fechaC;
        $res = mysqli_query($conexion, "select * from usuario where cedula = " . $ced) or die("La consulta no se pudo realizar " . mysqli_error($conexion));
        $horaM = mysqli_query($conexion, "select * from agendamedico");
        $agenda = mysqli_fetch_array($horaM);
        $duracion = $agenda['duracion'];
        $cantHora = $agenda['horaF'] - $agenda['horaI'];
        $estado = mysqli_query($conexion, "select hora from agendamiento where estado = '1'");
        $nf = mysqli_num_rows($res);
        $dato = mysqli_fetch_array($res);
        $cantCitas = ($cantHora * 60) / $duracion;
        if ($nf > 0) {
            ?>
            <form method="POST" action="agendamiento3.php">
                
                <!--<input type="button" value="Generar citas" onclick="fecha()">-->
                <?php
                $frm = '<h2>Bienvenido ' . $dato['nombres'] . '</h2><br>';
                echo $frm;?>
                Fecha de la cita: <input type="date" name="txtFecha" required><br>
                $frm = 'Cédula: <input type="text" name="txtCed" placeholder="Ingrese cedula" value="' . $ced . '" disabled><br>';
                <input type="button" value="Generar horario" onclick="cita()">
                <?php
                $frm .= 'Hora de la cita:';
                $val = date('H:i', strtotime('' . $agenda['horaI']));
                $j =0;
                for ($i = 0; $i <= $cantCitas; $i++) {
                    $horaCita = mysqli_fetch_array($estado);
                    $horaCita2[$i] = date('H:i', strtotime($horaCita['hora']));
                    if ($val == $horaCita2[$j]) {
                        $frm .= '<input type="radio" name="hora" value="' . $val . ' " disabled>' . $val . '';
                        $val = date('H:i', strtotime('' . $agenda['horaI'] . ' + ' . $duracion . ' minutes'));
                        $duracion = $duracion + $agenda['duracion'];
                        $j++;
                    } else {
                        $frm .= '<input type="radio" name="hora" value="' . $val . ' ">' . $val . '';
                        $val = date('H:i', strtotime('' . $agenda['horaI'] . ' + ' . $duracion . ' minutes'));
                        $duracion = $duracion + $agenda['duracion'];
                    }
                    #$frm .= '<a href="cita.php?hora='.$val.'">'.$val.'</a>'."  ";
                }
                echo $frm . '<br>';
            } else {
                echo 'Lo sentimos, ud no se encuentra registrado. Registrese<br>"';
                echo '<a href="registrar.html">Registrarse</a>';
            }
            ?>
            <?php
            mysqli_close($conexion);
            echo '<a href = "agendamiento.php">Regresar</a><br>';
            ?> 
                
            <input type="submit" value="Registrar cita">
        </form>
    </body>
</html>