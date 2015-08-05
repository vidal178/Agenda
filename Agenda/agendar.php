<!DOCTYPE html>

<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h2>Agendar cita</h2>
        <form method="POST" action="agendar2.php" name="f1">
            Cédula: <input type="text" name="txtCed" placeholder="Ingrese cedula"><br>
            Nombre: <input type="text" name="txtNom" placeholder="Ingrese nombre"><br>
            Fecha Inicio: <input type="date" name="txtFI" required>
            Fecha Final: <input type="date" name="txtFF" required><br>
            Hora Inicio: <input type="time" name="txtHI" required>
            Hora Final: <input type="time" name="txtHF" required><br>
            Duración cita:
            <select name="duracion">
                <option value="5">5 minutos</option>
                <option value="10">10 minutos</option>
                <option value="15">15 minutos</option>
                <option value="30">30 minutos</option>
                <option value="60">60 minutos</option>
            </select><br>
            <input type="button" value="Agendar" onclick="validar()">
        </form>
        <div id="respuesta"></div>
        <script type="text/javascript">
            function validar(){
                var fecha = document.f1.txtFI.value;
                var fechaFF = document.f1.txtFF.value;
                var fechaF = fechaFF.split("-");
                var anoF = parseInt(fechaF[0]);
                var mesF = parseInt(fechaF[1]);
                var diaF = parseInt(fechaF[2]);
                var fechaI = fecha.split("-");
                var anoI = parseInt(fechaI[0]);
                var MesI = parseInt(fechaI[1]);
                var diaI = parseInt(fechaI[2]);
                var f = new Date();
                var ano = f.getFullYear();
                var dia = f.getDate();
                var mes = f.getMonth()+1;
                var es = document.getElementById("respuesta");
                if((MesI >= mes) && (anoI >= ano) && (diaI >= dia)&&(mesF >= MesI)&&(anoF >= anoI)&&(diaF >= diaI)){
                    document.f1.submit();
                }else{
                    es.innerHTML = "Por favor coloque bien las fechas";
                }
            }
        </script>
        
    </body>
</html>
