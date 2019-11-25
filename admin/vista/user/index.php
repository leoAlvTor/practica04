<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Usuario</title>
    <link rel="stylesheet" type="text/css" href="../../../CSS/Modal.css">
    <script rel="script" type="text/javascript" src="../../controlador/user/index.js"></script>
    <script>
        function remitente(){
            let params = new URLSearchParams(location.search);
            document.getElementById('reu_remitente').value = params.get('correo');
            getUsuarios();
            getReuniones();
        }
        function addInvitado() {
            document.getElementById('invitados').value = document.getElementById('invitados').value + document.getElementById('comboUsuarios').value + ',';
            cerrarModal();
        }
    </script>

    <script rel="script" type="text/javascript" src="../../../CSS/modal.js"></script>
    <link rel="stylesheet" type="text/css" href="../../../CSS/LogIn.css">
</head>
<style>
    #comboUsuarios{
        width: 50%;
        height: 30px;
    }
    table {
        margin-left: auto;
        margin-right: auto;
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 70%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #d2ff00;
    }

</style>

<body onload="remitente()">

<button id="boton" onclick="editarCuenta()"> Mi Cuenta </button>

<form id = "formulario" method="post" onsubmit="return crearReunion2()">

    <label for="reu_fecha">Fecha de la reunion:</label><br>
    <input type="date" id="reu_fecha" name="reu_fecha"><br>
    <label for="reu_hora">Hora de la reunion:</label><br>
    <input type="time" id="reu_hora" name="reu_hora"><br>
    <label for="reu_lugar">Lugar ha realizarse:</label><br>
    <input type="text" id="reu_lugar" name="reu_lugar"><br>
    <label for="reu_coord_lat">Latitud de la ubicacion:</label><br>
    <input type="text" id="reu_coord_lat" name="reu_coord_lat"><br>
    <label for="reu_coord_lon">Longitud de la ubicacion:</label><br>
    <input type="text" id="reu_coord_lon" name="reu_coord_lon"><br>
    <label for="reu_remitente">Remitente:</label><br>
    <input disabled type="text" id="reu_remitente" name="reu_remitente"><br>
    <label for="reu_motivo">Motivo de la reunion:</label><br>
    <input type="text" id="reu_motivo" name="reu_motivo"><br>
    <label for="reu_observaciones">Observaciones:</label><br>
    <input type="text" id="reu_observaciones" name="reu_observaciones"><br>
    <input type="submit" name="Crear Invitacion" value="Crear Reunion">
    <input type="hidden" id="invitados" name="invitados"><br>
</form>

<div>
    <p id="usuarios">

    </p>
</div>

<div id="div_busqueda">
    <label for="txt_buscar">Ingrese el motivo:</label><br>
    <input type="text" id="txt_buscar" name="txt_buscar" onkeyup="buscarXMotivo()"><br>
    <p id="div_datos">

    </p>
</div>
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p id = 'aqui_usuario'></p>
        <button onclick="addInvitado()">INVITAR USUARIO</button>
        <button onclick="cerrarModal()">Cancelar</button>
    </div>

</div>
</body>
</html>