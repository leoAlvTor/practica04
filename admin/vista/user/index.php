<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Panel Usuario</title>
    <link rel="stylesheet" type="text/css" href="../../../CSS/Modal.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script rel="script" type="text/javascript" src="../../controlador/user/index.js"></script>
    <script>
        function remitente(){
            let params = new URLSearchParams(location.search);
            document.getElementById('reu_remitente').value = params.get('correo');
            getUsuarios();
        }
    </script>
    <script rel="script" type="text/javascript" src="../../../CSS/modal.js"></script>
</head>
<body onload="remitente()">
<form id = "formulario" onsubmit="" class="form-horizontal">

    <label for="reu_fecha">Fecha de la reunion:</label><br>
    <input class = 'form-control mb-100' type="date" id="reu_fecha" name="reu_fecha"><br>
    <label for="reu_hora">Hora de la reunion:</label><br>
    <input class = 'form-control mb-4' type="time" id="reu_hora" name="reu_hora"><br>
    <label for="reu_lugar">Lugar ha realizarse:</label><br>
    <input class = 'form-control mb-4' type="text" id="reu_lugar" name="reu_lugar"><br>
    <label for="reu_coord_lat">Latitud de la ubicacion:</label><br>
    <input class = 'form-control mb-4' type="text" id="reu_coord_lat" name="reu_coord_lat"><br>
    <label for="reu_coord_lon">Longitud de la ubicacion:</label><br>
    <input class = 'form-control mb-4' type="text" id="reu_coord_lon" name="reu_coord_lon"><br>
    <label for="reu_remitente">Remitente:</label><br>
    <input class = 'form-control mb-4' disabled type="text" id="reu_remitente" name="reu_remitente"><br>
    <label for="reu_motivo">Motivo de la reunion:</label><br>
    <input class = 'form-control mb-4' type="text" id="reu_motivo" name="reu_motivo"><br>
    <label for="reu_observaciones">Observaciones:</label><br>
    <input class = 'form-control mb-4' type="text" id="reu_observaciones" name="reu_observaciones"><br>
    <input type="hidden" id="invitados" name="invitados"><br>
    <input type="submit" name="Crear Invitacion">
</form>

<div>
    <p id="usuarios">

    </p>
</div>

<div id="div_datos">

</div>
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <p id = 'aqui_usuario'></p>
        <button onclick="addInvitado()">INVITAR USUARIO</button>
        <button onclick="cerrarModal()">Cancelar</button>
    </div>

</div>

</body>

</html>



<?php
$valor = $_GET['correo'];
echo "";
?>