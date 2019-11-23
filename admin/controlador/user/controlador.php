<?php

    include '../../../config/conexionDB.php';
    $remite_mail = $_GET['remite'];
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
