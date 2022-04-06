$(document).ready(function () {
    // RISKY 🙀
    const colorThief = new ColorThief();
    const img = document.querySelector('img');

    let colorMain = colorThief.getColor(img);
    console.log(colorMain);
    $(".tarjeta").css("background-color", "rgb(" + colorMain[0] +"," + colorMain[1] +" ," + colorMain[2] + " )");
    //$(".tarjeta").css("background-color", 'white');
});