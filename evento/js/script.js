$(document).ready(function () {
    $(".chosen-select").chosen();

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
                },
                "html"
            );
        }
    });
});