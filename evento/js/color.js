$(document).ready(function () {
    const colorThief = new ColorThief(); //Declaramos el color thief
    const img = document.querySelector('img'); //Declaramos la imagen
    let colorMain = colorThief.getColor(img); //Traemos el color dominante
    let paleta = colorThief.getPalette(img); //Traemos la paleta
    //Mostramos la paleta
    console.log("Paleta:");
    paleta.forEach(color => {
        console.log("rgb(" + color[0] + ", " + color[1] + ", " + color[2] + ")");
    });
    //Colores definidos
    let colorBase = "rgb(" + colorMain[0] +"," + colorMain[1] +" ," + colorMain[2] + " )"; //Base 1
    let colorFont = "rgb(" + paleta[0][0] +"," + paleta[0][1] +" ," + paleta[0][2] + " )"; //Font
    let colorCategoryBase = "rgb(" + paleta[9][0] +"," + paleta[9][1] +" ," + paleta[9][2] + " )"; //Base 2
    //Verificar cosas
    if( colorBase == colorFont ){ //Verificar si la base y el font son igual
        colorFont = "rgb(" + paleta[1][0] +"," + paleta[1][1] +" ," + paleta[1][2] + " )";
    }
    if( colorMain[0] <= 100 && colorMain[1] <= 100 && colorMain[2] <= 100 && paleta[0][0] <= 100 && paleta[0][1] <= 100 && paleta[0][2] <= 100 ){
        colorFont = "rgb(" + paleta[1][0] +"," + paleta[1][1] +" ," + paleta[1][2] + " )";
    }
    //if( paleta[9][0] <= 50 && paleta[9][1] <= 50 && paleta[9][2] <= 50 ){
    //    colorFont = "rgb(" + paleta[1][0] +"," + paleta[1][1] +" ," + paleta[1][2] + " )";
    //}
    //Mostramos el color dominante
    console.log("Color:");
    console.log(colorBase);
    $(".tarjeta").css("background-color", "rgb(" + colorMain[0] +"," + colorMain[1] +" ," + colorMain[2] + " )");
    $(".tarjeta-contenido").css("background-color", "rgba(" + colorMain[0] +"," + colorMain[1] +" ," + colorMain[2] + ", 0.9 )");
    $(".tarjeta-contenido").css("box-shadow", "-40px -40px 100px 100px rgba(" + colorMain[0] +"," + colorMain[1] +" ," + colorMain[2] + ",0.9)");
    $(".tarjeta-contenido").css("color", colorFont);
    $(".tarjeta-categoria-p").css("background-color", colorCategoryBase);
    $(".tarjeta-btn").css("color", colorFont);
    $(".tarjeta-btn").css("border", colorCategoryBase + " solid 2px");
    $(".tarjeta-btn").on('mouseover',function(){
  
        $(this).css({
            "background-color": colorCategoryBase,
            "color": "black"
        });
      
    });
    $(".tarjeta-btn").on('mouseout',function(){
  
        $(this).css({
            "background-color": "transparent",
            "color": colorFont
        });
      
    });

    $("#btnDelete").on("click", function(){
        let confirmacion = confirm("¿Seguro que quieres eliminar este evento? Eliminaras todo lo que posee, puedes dejar a personas sin que hacer.");
        if(confirmacion){
            console.log($("#idEvento").html());
            window.location.href = "deleteEvento.php?idEvento=" + $("#idEvento").html();
        }
    });
});
//formEventos.php?idEvento=<?php echo $idEvento; ?>