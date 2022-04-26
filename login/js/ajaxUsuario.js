$(document).ready(function () {
    $('#txtUsuario').keyup(function (e) {
        let usuario=$('#txtUsuario').val();
        
        $.ajax({
            url:'UsuarioCorrecto.php',
            type:'POST',
            data:{usuario},
            success: function (response) {
                if (response=="no existe") {
                    $('#alerta').html("");
                    $('#enviar').css("background-color", "green")
                }else{
                    $('#alerta').html("<div class='alert alert-primary' role='alert'><strong>Este Nombre de Usuario ya existe</strong></div>");
                    $('#enviar').css("background-color", "red")
                }
            }
        })
    })
})