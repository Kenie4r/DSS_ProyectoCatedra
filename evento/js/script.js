$(document).ready(function () {
    $(".chosen-select").chosen({no_results_text: "No hay categorías con el nombre: ", max_selected_options: 10});

    $("#frmNewCategory").hide();

    $("#btnNewCategory").click(function(){
        $("#frmNewCategory").fadeIn("slow");
    });

    $("#cancelNewCategory").click(function(){
        $("#frmNewCategory").hide();
    });

    $("#saveNewCategory").click(function(){
        let categoria = $("#txtNewCategory").val();
        if(categoria != null && categoria != ""){
            $.post("../modelo/saveCategory.rapid.php", 
                {
                    "titulo": categoria
                },
                function(respuesta){
                    if(respuesta != null){
                        alert("Se ha agregado la categoría correctamente.");
                        $("#txtNewCategory").val("")
                        actualizarSelectCategory(respuesta);
                    }else{
                        alert("ERROR: No se pudo agregar la categoría.");
                    }
                },
                "html"
            );
        }
        
    });

    $("#txtName").on("input", function(){
        verificarTituloEvento();
    });

    verificarTituloEvento();
});

function actualizarSelectCategory(respuesta) {
    $("#sltCategorias").html(respuesta);
    $(".chosen-select").chosen().trigger("chosen:updated");
}

function verificarTituloEvento(){
    $.post("../modelo/getCoincidenciasName.php", 
                {
                    "tituloEvento": $("#txtName").val()
                },
                function(respuesta){
                    if(respuesta == "Sin coincidencias."){
                        $("#txtName").removeClass("input-titulo-rojo");
                        $("#txtName").addClass("input-titulo-verde");
                        $("#goodTitulo").show();
                        $("#badTitulo").hide();
                        console.log(respuesta);
                        $("#btnSubmit").attr("disabled", false);
                    }else{
                        $("#txtName").removeClass("input-titulo-verde");
                        $("#txtName").addClass("input-titulo-rojo");
                        $("#goodTitulo").hide();
                        $("#badTitulo").show();
                        console.log(respuesta);
                        $("#btnSubmit").attr("disabled", true);
                    }
                },
                "html"
            );
}