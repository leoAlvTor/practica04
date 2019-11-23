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
    xmlhttp.open('GET','/practica04/admin/controlador/user/controlador.php?remite='+remite, true);
    xmlhttp.send();
    return false;
}

function addInvitado(){
    cerrarModal();
    alert('se agrega el invitado');
}
