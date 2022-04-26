var nombreuUsuario=document.querySelector('#txtUsuario');
var contra1=document.getElementById('txtContra');
var contra2=document.getElementById('txtContraCon');




contra2.addEventListener('keyup',function () {
    var valorContra1=contra1.value;
var valorContra2=contra2.value;
var enviar=document.getElementById('enviar');
    if (valorContra1==valorContra2) {
        enviar.disable=false;
        document.getElementById('enviar').style.background='green';
        document.getElementById('alerta').innerHTML="";
    }else{
        enviar.disable=true;
        document.getElementById('enviar').style.background='red';
        document.getElementById('alerta').innerHTML="<div class='alert alert-primary' role='alert'><strong>Verifique las contraseñas</strong></div>";
        console.log("NO SOn iguael");
    }
})

