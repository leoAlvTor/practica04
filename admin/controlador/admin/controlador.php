<?php

    include '../../../config/conexionDB.php';

    if($_POST['funcion']==='getreunion'){
        getReuniones();
    }else if($_POST['funcion'] === 'eliminar'){
        eliminar();
    }else if($_POST['funcion'] === 'buscar'){
        buscar();
    }else if($_POST['funcion'] === 'update'){
        actualizarCuenta();
    }else if($_POST['funcion'] === 'elmuser'){
        eliminarUsuario();
    }

    function getReuniones(){
        global $conexion;
        $sql = "select reu_id, reu_fecha, reu_hora, reu_lugar, reu_coord_lat, reu_coord_lon, reu_motivo, usu_nombres,
       reu_observaciones from reunion, (select usu_nombres, usu_codigo from usuario) AS leo where leo.usu_codigo = reu_remitente
       order by reu_fecha desc";
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
            echo "<th>Remitente</th>";
            echo "<th>Observaciones</th>";
            echo "<th>ELIMINAR</th>";
            echo "</tr>";
            while($row = $resultados->fetch_assoc()){
                echo "<tr>";
                echo "<td>" . $row['reu_fecha'] . "</td>";
                echo "<td>" . $row['reu_hora'] . "</td>";
                echo "<td>" . $row['reu_lugar'] . "</td>";
                echo "<td>" . $row['reu_coord_lat'] . "</td>";
                echo "<td>" . $row['reu_coord_lon'] . "</td>";
                echo "<td>" . $row['reu_motivo'] . "</td>";
                echo "<td>" . $row['usu_nombres'] . "</td>";
                echo "<td>" . $row['reu_observaciones'] . "</td>";
                $reu_id = $row['reu_id'];
                echo "<td>" . "<button id = $reu_id onclick='eliminar(this)'> Eliminar? </button>" . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        $conexion->close();
    }

    function actualizarCuenta(){
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
            usu_fecha_nacimiento = '$fecha', usu_fecha_modificacion = now() where usu_codigo = '$id_org'";
        if($conexion->query($sql) === TRUE){
            echo "<p>Se han actualizado los datos correctamente</p>";
        }else{
            echo "<p>No se ha podido actualizar los datos del usuario</p>";
        }
        $conexion->close();
    }

    function eliminar(){
        global $conexion;
        $id = $_POST['id'];
        $sql = "delete from usuario_reunion where reunion_id = $id";
        $sql1 = "delete from reunion where reu_id = $id";
        if($conexion->query($sql) === TRUE){
            if($conexion->query($sql1) === TRUE){
                echo "<p>Se ha eliminado correctamente la reunion</p>";
            }else{
                echo "<p>Ha ocurrido un error</p>";
            }
            echo "<p>Se ha eliminado de nuevo :v</p>";
        }else{
            echo "<p> Ha ocurrido un error eliminando valor intermedio</p>";
        }
        $conexion->close();
    }

    function eliminarUsuario()
    {
        global $conexion;
        $id = $_POST['id'];
        $sql1 = "update usuario set usu_eliminado = 'S' where usu_codigo='$id'";
        $sql = "update usuario_reunion set usuario_id = null where usuario_id = '$id'";
        if ($conexion->query($sql) === TRUE) {
            if ($conexion->query($sql1) === TRUE) {
                echo "<p>Se ha eliminado el usuario correctamente</p>";
            } else {
                echo "<p>No se ha podido eliminar</p>";
            }
        }else{
                echo "<p>No se ha podido eliminar</p>";
            }
            $conexion->close();
    }

        function buscar()
        {
            global $conexion;
            $correo = $_POST['buscar'];
            $sql = "select usu_codigo from usuario where usu_correo='$correo' and usu_eliminado != 'S' and usu_rol!='a'";
            $result = $conexion->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo $row['usu_codigo'];
                }
            } else {
                echo 'void';
            }
            $conexion->close();
        }
?>