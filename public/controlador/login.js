function logeo(){
    let correo = document.getElementById('usu_correo').value;
    let password = document.getElementById('usu_contrasena').value;
    let xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if(this.readyState === 4 && this.status === 200){
            if(this.responseText === '0'){
                document.getElementById('datos').innerHTML = "<h1>NO SE ENCUENTRA REGISTRADO</h1><br><a href='../vista/Crear_Usuario.html'>Crear nuevo usuario</a>";
            }else if(this.responseText.includes('yes')){
                window.location='../../admin/vista/admin/index.php';
            }else if(this.responseText.includes('no')){
                window.location ='../../admin/vista/user/index.php?correo='+correo;
            }
        }
    };
    xmlhttp.open('GET', '/practica04/public/controlador/login.php?id='+correo+'&pass='+password, true);
    xmlhttp.send();
    return false;
}