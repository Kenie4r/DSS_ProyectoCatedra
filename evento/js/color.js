$(document).ready(function () {
    // RISKY 🙀
    const colorThief = new ColorThief();
    const img = document.querySelector('img');

    let colorMain = colorThief.getColor(img);
    console.log(colorMain[0]);
    console.log(colorMain[1]);
    console.log(colorMain[2]);
    $(".tarjeta").css("background-color", "rgb(" + colorMain[0] +"," + colorMain[1] +" ," + colorMain[2] + " )");
    $(".tarjeta-contenido").css("background-color", "rgba(" + colorMain[0] +"," + colorMain[1] +" ," + colorMain[2] + ", 0.9 )");
    $(".tarjeta-contenido").css("box-shadow", "-40px -40px 100px 100px rgba(" + colorMain[0] +"," + colorMain[1] +" ," + colorMain[2] + ",0.9)");

    $("#btnDelete").on("click", function(){
        let confirmacion = confirm("¿Seguro que quieres eliminar este evento? Eliminaras todo lo que posee, puedes dejar a personas sin que hacer.");
        if(confirmacion){
            console.log($("#idEvento").html());
            window.location.href = "deleteEvento.php?idEvento=" + $("#idEvento").html();
        }
    });
});
//formEventos.php?idEvento=<?php echo $idEvento; ?>