function getUsuarios(){
    let xmlhttp;
    let remite = document.getElementById('reu_remitente').value;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }else{
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlhttp.onreadystatechange = function () {
        if(this.readyState === 4 && this.status === 200){
            document.getElementById('usuarios').innerHTML = this.responseText;
        }
    };
    xmlhttp.open('GET','/practica04/admin/controlador/user/controlador.php?funcion=usuarios&remite='+remite, true);
    xmlhttp.send();
    return false;
}

function crearReunion2(){
    let invitados = document.getElementById('invitados').value;
    let remite = document.getElementById('reu_remitente').value;
    let http = new XMLHttpRequest();
    let url = '/practica04/admin/controlador/user/controlador.php';
    let params = 'funcion=reunion&remite='+remite;
    http.open('POST', url, true);
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState === 4 && http.status === 200) {
            alert(http.responseText);
        }
    };
    http.send(params);
    return false;
}
