function getUsuarios(){
    let xmlhttp = new XMLHttpRequest();
    let remite = document.getElementById('reu_remitente').value;
    let url = '/practica04/admin/controlador/user/controlador.php';
    let params = 'funcion=usuarios&remite='+remite;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById('usuarios').innerHTML = this.responseText;
        }
    };
    xmlhttp.send(params);
    return false;
}

function getReuniones(){
    let remite = document.getElementById('reu_remitente').value;
    let url = '/practica04/admin/controlador/user/controlador.php';
    let xmlhttp = new XMLHttpRequest();
    let params = 'funcion=getreuniones&remite='+remite;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.onreadystatechange = function () {
        if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
            document.getElementById('div_datos').innerHTML = this.responseText;
        }
    };
    xmlhttp.send(params);
    return false;
}

function buscarXMotivo(){
    let remite = document.getElementById('reu_remitente').value;
    let motivo = document.getElementById('txt_buscar').value;
    let xmlhttp = new XMLHttpRequest();
    let url = '/practica04/admin/controlador/user/controlador.php';
    let params = 'funcion=bscMotivo&remite='+remite+"&motivo="+motivo;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.onreadystatechange = function () {
        if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
            let elemento = document.getElementById('tablita');
            if(typeof(elemento) != 'undefined' && elemento != null){
                elemento.parentNode.removeChild(elemento);
            }
            document.getElementById('div_datos').innerHTML = this.responseText;
        }
    };
    xmlhttp.send(params);
    return false;
}

function editarCuenta(){
    window.location='../../vista/user/ActualizarDatos.html?correo='+document.getElementById('reu_remitente').value;
}

function actualizarCuenta(){
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
    let url = '/practica04/admin/controlador/user/controlador.php';
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
    return false;
}

function crearReunion2(){
    let invitados = document.getElementById('invitados').value;
    let remite = document.getElementById('reu_remitente').value;

    let fecha = document.getElementById('reu_fecha').value;
    let hora = document.getElementById('reu_hora').value;
    let lugar = document.getElementById('reu_lugar').value;
    let coord_lat = document.getElementById('reu_coord_lat').value;
    let coord_lon = document.getElementById('reu_coord_lon').value;
    let motivo = document.getElementById('reu_motivo').value;
    let observaciones = document.getElementById('reu_observaciones').value;

    let http = new XMLHttpRequest();
    let url = '/practica04/admin/controlador/user/controlador.php';
    let params = 'funcion=reunion&remite='+remite+'&invitados='+invitados+'&fecha='+fecha+'&hora='+hora+'&lugar='+lugar+
        '&latitud='+coord_lat+'&longitud='+coord_lon+'&motivo='+motivo+'&observaciones='+observaciones;
    http.open('POST', url, true);
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    http.onreadystatechange = function() {
        if(http.readyState === 4 && http.status === 200) {
            alert(http.responseText);
        }
    };
    http.send(params);
    return false;
}