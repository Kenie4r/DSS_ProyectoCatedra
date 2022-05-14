let idEvento = $("#event").val(); 
let idUsuario = $("#user").val(); 

console.log(idEvento + " | " + idUsuario)

let btnUnirme = document.getElementById('btn-enter'); 
if(btnUnirme!=null){
    btnUnirme.addEventListener("click", (e)=>{
        Swal.fire({
            title: '¿Te quiéres unir a este evento',
            showDenyButton: true, 
            denyButtonText: 'No quiero unirme', 
            confirmButtonText: 'Sí quiero unirme' 
        }).then((result)=>{
            if(result.isConfirmed){
              $.post('../modelo/saveConfirmation.php?option=s', 
              {
                  'user': idUsuario, 
                  'event': idEvento
              }
              ,
              function (result){
                Swal.fire(result).then((result)=>{location.reload()}) 
                }
              )
            }
        })
    })
}

let btnConf = document.getElementById('btn-conf');
if(btnConf!=null){
    btnConf.addEventListener("click", (e)=>{
        Swal.fire({
            title: '¿Quiéres confirmar tu asistencia o cancelar la asistencia?',
            showDenyButton: true, 
            showCancelButton: true,
            denyButtonText: 'Cancelar asistecia', 
            confirmButtonText: 'Si, confirmar' 
        }).then((result)=>{
            if(result.isConfirmed){
              $.post('../modelo/saveConfirmation.php?option=c', 
              {
                  'user': idUsuario, 
                  'event': idEvento
              }
              ,
              function (result){
                Swal.fire(result).then((result)=>{location.reload()}) 
                }
              )
            }else if(result.isDenied){
                $.post('../modelo/saveConfirmation.php?option=e', 
              {
                  'user': idUsuario, 
                  'event': idEvento
              }
              ,
              function (result){
                Swal.fire(result).then((result)=>{location.reload()}) 
            }
              )
            }
        })
    })
}
