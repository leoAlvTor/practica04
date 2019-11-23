<!DOCTYPE html>
<html lang='es'>
<head>
    <title>Sistema de Reuniones Patito</title>
    <style>
        header {
            font-size: 25px;
            text-align: center;
        }

        form {
            padding-left: 10px;
            padding-bottom: 10px;
            padding-top: 10px;
            border-left: 6px solid;
            background-color: #b5bed3;
            width: 30%;
        }

        input {
            margin-top: 5px;
            width: 55%;
        }

        .tablita{
            border-collapse: collapse;
            width: 100%;
        }

        .headersito{
            text-align: left;
            padding: 8px;

            background-color: #6C7A95;
            color: white;
        }

        .datita{
            text-align: left;
            padding: 8px;
        }

        .rowsitos:nth-child(even){
            background-color: #f2f2f2
        }

    </style>
</head>
<body>

<form onsubmit="return obtenerReuniones()">
    <input type="hidden" id = "usu_codigo" name="usu_codigo" value="">
    <input type="button" id="citas" name="citas" value="Mostrar Citas">
</form>

<div id="datos">

</div>

<form method="post" action="index.php">
    <label for="reu_fecha">Fecha:</label><br>
    <input type="date" name="reu_fecha" id="reu_fecha"><br>
    <label for="reu_hora">Hora:</label><br>
    <input type="time" name="reu_hora" id="reu_hora"><br>
    <label for="reu_lugar">Lugar:</label><br>
    <input type="text" name="reu_lugar" id="reu_lugar" placeholder="Lugar de la reunion"><br>
    <label for="reu_coord_lat">Coordenadas:</label><br>
    <input type="text" name="reu_coord_lat" id="reu_coord_lat" placeholder="Latitud-Longitud"><br>
    <label for="reu_remitente">Remitente:</label><br>
    <input type="text" name="reu_remitente" id="reu_remitente"><br>
    <label for="reu_motivo">Motivo:</label><br>
    <input type="text" name="reu_motivo" id="reu_motivo" placeholder="Ingrese el motivo."><br>
    <label for="reu_observaciones">Observaciones:</label><br>
    <input type="text" name="reu_observaciones" id="reu_observaciones" placeholder="Ingrese las observaciones"><br>
    <label for="txt_inv">Invitado:</label><br>
    <input type="text" name="txt_inv" id="txt_inv" placeholder="Ingrese el correo del invitado">
    <button onclick="return getMensaje()">Agregar Invitado</button><br>
    <input type="submit" value="Crear Reunion" name="btn_crear" id="btn_crear">
    <input type="text" name="reu_invitado" id="reu_invitado" style="visibility: hidden">
</form>

<div>
    <p>POSIBLES USUARIOS</p>
</div>

<span id="factors"></span>

    <script>
        function enter() {
            let valor = document.getElementById('txt_inv').value;
            document.getElementById('reu_invitado').value += valor + ',';
            document.getElementById('txt_inv').value = '';
            return false;
        }
        function obtenerReuniones(){
            let id = document.getElementById('usu_codigo').value;
            var xmlhttp;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }else{
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if(this.readyState === 4 && this.status === 200){
                    document.getElementById('datos').innerHTML = this.responseText;
                }
            };
            xmlhttp.open('GET', '../controlador/login.php?id='+id, true);
            xmlhttp.send();
            return false;
        }
    </script>

</body>
</html>