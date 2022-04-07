$(document).ready(function () {
    //Variables principales
    let colorThief = new ColorThief(); //Declaramos el color thief
    let img = document.querySelector("img"); //Declaramos la imagen
    //Variables de colores
    let colorBase1 = "black";
    let colorBase2 = "white";
    let colorRGBA = "rgba(0, 0, 0, 0.9)";
    let colorFont1 = "white";
    let colorFont2 = "black";
    //Si hay una imagen
    if(img != null){
        console.log("Se ha cargado correctamente la imagen.");
        //Variables especiales
        let colorMain = colorThief.getColor(img); //Traemos el color dominante
        let paleta = colorThief.getPalette(img); //Traemos la paleta
        //Colores definidos
        colorBase1 = "rgb(" + colorMain[0] +"," + colorMain[1] +" ," + colorMain[2] + " )"; //Base 1
        colorBase2 = "rgb(" + paleta[9][0] +"," + paleta[9][1] +" ," + paleta[9][2] + " )"; //Base 2
        colorRGBA = "rgba(" + colorMain[0] +"," + colorMain[1] +" ," + colorMain[2] + ", 0.9 )"; //Base RGBA
        colorFont1 = "rgb(" + paleta[0][0] +"," + paleta[0][1] +" ," + paleta[0][2] + " )"; //Font 1
        colorFont2 = "black"; //Font 2
        //Verificar que sean diferentes las base 1 y font 1, sino se cambia el font 1 al color #2 de la paleta
        if( colorBase1 == colorFont1 ){
            colorFont1 = "rgb(" + paleta[1][0] +"," + paleta[1][1] +" ," + paleta[1][2] + " )";
        }
        //Verificar si los colores base 1 y font, 1, no sean similares, sino se cambia el font 1 al color #2 de la paleta
        if( colorMain[0] <= 100 && colorMain[1] <= 100 && colorMain[2] <= 100 && paleta[0][0] <= 100 && paleta[0][1] <= 100 && paleta[0][2] <= 100 ){
            colorFont1 = "rgb(" + paleta[1][0] +"," + paleta[1][1] +" ," + paleta[1][2] + " )";
        }
        //Ver que el colo base 2 no sea muy oscuro, sino se cambia el font 2 al color #3 de la paleta
        if( paleta[9][0] <= 60 && paleta[9][1] <= 60 && paleta[9][2] <= 60 ){
            colorFont2 = "rgb(" + paleta[2][0] +"," + paleta[2][1] +" ," + paleta[2][2] + " )";
        }
        //Mostramos la paleta
        console.log("Paleta:");
        paleta.forEach(color => {
            console.log("rgb(" + color[0] + ", " + color[1] + ", " + color[2] + ")");
        });
        //Mostramos el color dominante
        console.log("Color:");
        console.log(colorBase1);
    }
    //Cambiamos los colores
    //Fondo
    $(".tarjeta").css({
        "background-color": colorBase1
    });
    //Fondo del contenido
    $(".tarjeta-contenido").css({
        "background-color": colorRGBA,
        "box-shadow": "-40px -40px 100px 100px " + colorRGBA,
        "color": colorFont1
    });
    //Categorias
    $(".tarjeta-categoria-p").css({
        "background-color": colorBase2,
        "color": colorFont2
    });
    //Botones
    $(".tarjeta-btn").css({
        "color": colorFont1,
        "border": colorBase2 + " solid 2px"
    });
    $(".tarjeta-btn").on('mouseover',function(){
  
        $(this).css({
            "background-color": colorBase2,
            "color": colorFont2
        });
      
    });
    $(".tarjeta-btn").on('mouseout',function(){
  
        $(this).css({
            "background-color": "transparent",
            "color": colorFont1
        });
      
    });

    //Validar el delete
    $("#btnDelete").on("click", function(){
        let confirmacion = confirm("¿Seguro que quieres eliminar este evento? Eliminaras todo lo que posee, puedes dejar a personas sin que hacer.");
        if(confirmacion){
            console.log($("#idEvento").html());
            window.location.href = "deleteEvento.php?idEvento=" + $("#idEvento").html();
        }
    });
});
//formEventos.php?idEvento=<?php echo $idEvento; ?>