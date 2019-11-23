<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8";
    <title>Administrar Cuenta</title>
    <style>
        .error{
            color: red;
            border: 10px greenyellow;
        }
    </style>
</head>

<body>
    <?php
        $cedula ="";
        $nombre = "";
        $apellido = "";
        $direccion = "";
        $telefono ="";
        $correo = "";
        $password = "";
        $fecha = "";

        include "../../config/conexionDB.php";
        if($_SERVER['REQUEST_METHOD'] === 'POST' && verificar()){
            if(isset($_POST['modificar'])){
                modificar();
            }else if(isset($_POST['eliminar'])){
                eliminar();
            }else if(isset($_POST['modpass'])){
                actualizarPass();
            }
        }

        function verificar(){
            global $cedula, $nombre, $apellido, $direccion, $telefono, $correo, $password, $fecha;
            if(isset($_POST['cedula'])){
                $cedula = trim($_POST['cedula']);
            }else{
                return false;
            }
            if(isset($_POST['nombre'])){
                $nombre = trim($_POST['nombre']);
            }else{
                return false;
            }
            if(isset($_POST['apellido'])){
                $apellido = trim($_POST['apellido']);
            }else{
                return false;
            }
            if(isset($_POST['direccion'])){
                $direccion = trim($_POST['direccion']);
            }else{
                return false;
            }
            if(isset($_POST['telefono'])){
                $telefono = trim($_POST['telefono']);
            }else{
                return false;
            }
            if(isset($_POST['correo'])){
                $correo = trim($_POST['correo']);
            }else{
                return false;
            }
            if(isset($_POST['password'])){
                $password = trim($_POST['password']);
            }else{
                return false;
            }
            if(isset($_POST['fecha'])){
                $password = trim($_POST['fecha']);
            }else{
                return false;
            }
            return true;
        }

        function modificar(){

        }

        function eliminar(){

        }

        function actualizarPass(){

        }
    ?>
</body>
</html>
