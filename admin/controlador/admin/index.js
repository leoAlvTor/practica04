function getReuniones(){
    let url = '/practica04/admin/controlador/admin/controlador.php';
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.open('POST', url, true);
    let params = 'funcion=getreunion';
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.onreadystatechange = function () {
        if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
            document.getElementById('reuniones').innerHTML = this.responseText;
        }
    };
    xmlhttp.send(params);
    return false;
}

function eliminar(value){
    alert('ELIMINAR');
    let url = '/practica04/admin/controlador/admin/controlador.php';
    let id = value.id;
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.open('POST', url, true);
    let params = 'funcion=eliminar&id='+id;
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.onreadystatechange = function () {
        if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
            document.getElementById('mensajes').innerHTML = this.responseText;
        }
    };
    xmlhttp.send(params);
    return false;
}

function adminUsuarios(){
    window.location='../../vista/admin/AdminUsuarios.html';
}

function buscarUsuario(){
    let url = '/practica04/admin/controlador/admin/controlador.php';
    let id = document.getElementById('buscar').value;
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.open('POST', url, true);
    let params = 'funcion=buscar&buscar='+id;
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.onreadystatechange = function () {
        if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
            let retorno = this.responseText;
            if(retorno === 'void'){
                alert('No se ha encontrado al usuario');
            }else{
                document.getElementById('id').value = retorno;
                document.getElementById('mensajes').innerHTML = "<p>Se encontro al usuario</p>";
            }
        }
    };
    xmlhttp.send(params);
    return false;
}

function actualizar_usuario() {
    alert('entro');
    if(document.getElementById('id').value !== ''){
        let id_original = document.getElementById('id').value;
        let cedula = document.getElementById('cedula').value;
        let nombre = document.getElementById('nombre').value;
        let apellido = document.getElementById('apellido').value;
        let direccion = document.getElementById('direccion').value;
        let telefono = document.getElementById('telefono').value;
        let correo = document.getElementById('correo').value;
        let pass = document.getElementById('password').value;
        let fecha = document.getElementById('fecha_nac').value;

        let xmlhttp = new XMLHttpRequest();
        let url = '/practica04/admin/controlador/admin/controlador.php';
        let params = 'funcion=update&id='+id_original+"&cedula="+cedula+"&nombre="+nombre+"&apellido="+apellido+
            "&direccion="+direccion+"&telefono="+telefono+"&correo="+correo+"&pass="+pass+"&fecha="+fecha;
        xmlhttp.open('POST', url, true);
        xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlhttp.onreadystatechange = function () {
            if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
                alert(this.responseText);
            }
        };
        xmlhttp.send(params);
    }else{
        alert('Aun no ha buscado a ningun usuario');
    }

    return false;
}

function eliminar_usuario(){
    alert('entro');
    if(document.getElementById('id').value !== ''){
        let id_original = document.getElementById('id').value;

        let xmlhttp = new XMLHttpRequest();
        let url = '/practica04/admin/controlador/admin/controlador.php';
        let params = 'funcion=elmuser&id='+id_original;
        xmlhttp.open('POST', url, true);
        xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlhttp.onreadystatechange = function () {
            if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
                alert(this.responseText);
            }
        };
        xmlhttp.send(params);
    }else{
        alert('Aun no ha buscado a ningun usuario');
    }

    return false;
}


function fun_tonta(){
    return false;
}