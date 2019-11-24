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
