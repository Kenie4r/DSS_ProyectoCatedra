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
                    alert(respuesta);
                    actualizarSelectCategory();
                },
                "html"
            );
        }
        
    });
});

function actualizarSelectCategory() {
    $.post("../modelo/getCategory.rapid.php",
        function(respuesta){
                $("#sltCategorias").html(respuesta);
                $(".chosen-select").chosen().trigger("chosen:updated");
            },
            "html"
    );
}