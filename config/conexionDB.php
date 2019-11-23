<?php

    $servidor = "localhost";
    $usuario = "root";
    $password = "root";
    $base = "hipermedial";

    $conexion = new mysqli($servidor, $usuario, $password, $base);
    $conexion->set_charset('utf8');

    if($conexion->connect_error){
        die("Conexion Fallida".$conexion->connect_error);
    }

?>
