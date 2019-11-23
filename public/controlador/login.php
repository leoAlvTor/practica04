<?php
include "../../config/conexionDB.php";

$correo = isset($_GET['id']) ? trim($_GET['id']) : null;
$passwrd = isset($_GET['pass']) ? trim($_GET['pass']) : null;
$sql = "SELECT * from usuario WHERE usu_correo = '$correo' AND usu_password = MD5('$passwrd')";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['usu_rol'] === 'a') {
            echo $row['usu_codigo'].'yes';
        } else {
            echo $row['usu_codigo'].'no';
        }
    }
} else {
    echo 0;
    
}
