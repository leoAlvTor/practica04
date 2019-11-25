<?php

    include '../../../config/conexionDB.php';
    if($_POST['funcion'] === 'usuarios'){
        global $conexion;
        $remite_mail = $_POST['remite'];
        $sql = "select usu_codigo, usu_cedula, usu_nombres from usuario where usu_rol ='u' and usu_correo!='$remite_mail'";
        $resultado = $conexion->query($sql);
        echo "<h2>Seleccione a los invitados</h2>";
        $strings = "<select id='comboUsuarios' onchange='crearModal(this)'>";
        if($resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
                $codigo = $row['usu_codigo'];
                $valor = 'Cedula:'.$row['usu_cedula'] . ' | Nombre:' .$row['usu_nombres'];
                $strings = $strings . "<option value='$codigo'>$valor</option>";
            }
            $strings = $strings . "</select>";
            echo $strings;
        }
        $conexion->close();
    }else if($_POST['funcion'] === 'reunion'){
        crearReunion();
    }else if($_POST['funcion'] === 'getreuniones'){
        getearReuniones();
    }else if($_POST['funcion'] === 'bscMotivo'){
        getearReunionesMotivo();
    }else if($_POST['funcion'] === 'update'){
        updateUsuario();
    }

    function getearReuniones(){
        $remitente_mail = $_POST['remite'];
        global $conexion;
        $sql = "select reu_fecha, reu_hora, reu_lugar, reu_coord_lat, reu_coord_lon, reu_motivo, reu_observaciones
            from reunion where reu_remitente = (select usu_codigo from usuario where usu_correo = upper('$remitente_mail'))";
        $resultados = $conexion->query($sql);
        if($resultados->num_rows>0){
            echo "<table id='tablita'>";
            echo "<tr>";
            echo "<th>Fecha</th>";
            echo "<th>Hora</th>";
            echo "<th>Lugar</th>";
            echo "<th>Latitud</th>";
            echo "<th>Longitud</th>";
            echo "<th>Motivo</th>";
            echo "<th>Observaciones</th>";
            echo "</tr>";
            while($row = $resultados->fetch_assoc()){
                echo "<tr>";
                    echo "<td>" . $row['reu_fecha'] . "</td>";
                    echo "<td>" . $row['reu_hora'] . "</td>";
                    echo "<td>" . $row['reu_lugar'] . "</td>";
                    echo "<td>" . $row['reu_coord_lat'] . "</td>";
                    echo "<td>" . $row['reu_coord_lon'] . "</td>";
                    echo "<td>" . $row['reu_motivo'] . "</td>";
                    echo "<td>" . $row['reu_observaciones'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        $conexion->close();
    }

    function getearReunionesMotivo(){
        $remitente_mail = $_POST['remite'];
        $motivo = $_POST['motivo'];
        global $conexion;
        $sql = "select reu_fecha, reu_hora, reu_lugar, reu_coord_lat, reu_coord_lon, reu_motivo, reu_observaciones
            from reunion where reu_remitente = (select usu_codigo from usuario where usu_correo = '$remitente_mail') and reu_motivo LIKE '%".$motivo."%'";
        $resultados = $conexion->query($sql);
        if($resultados->num_rows>0){
            echo "<table id='tablita'>";
            echo "<tr>";
            echo "<th>Fecha</th>";
            echo "<th>Hora</th>";
            echo "<th>Lugar</th>";
            echo "<th>Latitud</th>";
            echo "<th>Longitud</th>";
            echo "<th>Motivo</th>";
            echo "<th>Observaciones</th>";
            echo "</tr>";
            while($row = $resultados->fetch_assoc()){
                echo "<tr>";
                echo "<td>" . $row['reu_fecha'] . "</td>";
                echo "<td>" . $row['reu_hora'] . "</td>";
                echo "<td>" . $row['reu_lugar'] . "</td>";
                echo "<td>" . $row['reu_coord_lat'] . "</td>";
                echo "<td>" . $row['reu_coord_lon'] . "</td>";
                echo "<td>" . $row['reu_motivo'] . "</td>";
                echo "<td>" . $row['reu_observaciones'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        $conexion->close();
    }

    function crearReunion(){
        global $conexion;
        $remite = $_POST['remite'];
        $invitados = $_POST['invitados'];
        $lst_inv = explode(',', $invitados);
        echo $lst_inv . "----" . count($lst_inv);
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $lugar = $_POST['lugar'];
        $latitud = $_POST['latitud'];
        $longitud = $_POST['longitud'];
        $motivo = $_POST['motivo'];
        $observaciones = $_POST['observaciones'];

        $sql = "insert into reunion(reu_fecha, reu_hora, reu_lugar, reu_coord_lat, reu_coord_lon, reu_remitente, reu_motivo, reu_observaciones) VALUES ('$fecha', '$hora',
                    '$lugar', '$latitud', '$longitud', (select usu_codigo from usuario where usu_correo='$remite'), '$motivo', '$observaciones') ";
        if($conexion->query($sql) === TRUE){
            for($i = 0; $i < count($lst_inv)-1; $i++){
                $inv_act = $lst_inv[$i];
                $sql = "insert into usuario_reunion(usuario_id, reunion_id) values('$inv_act', (select max(reu_id) from reunion))";
                if($conexion->query($sql) !== TRUE){
                    echo "<h1>$conexion->error </h1>";
                }
            }
        }else{
            echo "<h1>$conexion->error</h1>";
        }
        $conexion->close();
    }

    function updateUsuario(){
        global $conexion;
        $id_org = $_POST['id'];
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $pass = $_POST['pass'];
        $fecha = $_POST['fecha'];

        $sql = "UPDATE usuario SET usu_cedula = '$cedula', usu_nombres='$nombre', usu_apellidos='$apellido', 
            usu_direccion = '$direccion', usu_telefono='$telefono', usu_correo = '$correo', usu_password=MD5('$pass'),
            usu_fecha_nacimiento = '$fecha', usu_fecha_modificacion = now() where usu_correo = '$id_org'";
        if($conexion->query($sql) === TRUE){
            echo "<p>Se han actualizado los datos correctamente</p>";
        }else{
            echo "<p>No se ha podido actualizar los datos del usuario</p>";
        }
        $conexion->close();
    }
