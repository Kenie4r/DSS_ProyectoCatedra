$(document).ready(function () {
    $("#filtroCategorias").chosen({
        no_results_text: "No hay categorías con el nombre: ",
        max_selected_options: 10
    });

    $("#btnFiltro").on("click", function(){
        let categoria = $("#filtroCategorias").val();
        if(categoria != "" && categoria != null && categoria != undefined){
            window.location.href = "index.php?idCategoria=" + categoria;
        }
    });
});