$(document).ready(function () {
    changeBackgroundBody();
    //Activamos el chosen, es decir, el select de las categorias
    $(".chosen-select").chosen({no_results_text: "No hay categorías con el nombre: ", max_selected_options: 10});

    //New Category ----------------------------------------------------------------------------
    //Ocultamos el form para la nueva categoria
    $("#frmNewCategory").hide();

    //Configuramos este boton para que aparezca el formulario
    $("#btnNewCategory").click(function(){
        $("#frmNewCategory").fadeIn("slow");
    });

    //Ocultamos el formulario
    $("#cancelNewCategory").click(function(){
        $("#frmNewCategory").hide();
    });

    //Guardamos la nueva categoria
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

    //Verificamos el titulo, al escribir en el input
    $("#txtName").on("input", function(){
        verificarTituloEvento();
    });

    //Verificamos el titulo, al iniciar la pagina
    verificarTituloEvento();

    //Cada que se modifique el input file, nosotros previsualiremos la imagen
    $("input[type='file']").change(function(e){
        let filename = e.target.files[0]; //Leemos el primer file
        let reader = new FileReader(); //Creamos un file reader
        //Cada que se cargue algo en el reader modificaremos el src de la imagen
        reader.onload = function(e) {
            $("#imgEvento").attr('src', e.target.result);
            changeBackgroundBody(e.target.result);
        }
        reader.readAsDataURL(filename); //Leemos el primer file y se lo pasamos al file reader
    })

    //Si el boton submit esta habilitado, le ponemos un mensaje para decir que se deben de llenar las cosas bien
    //porque los input no se validan con codigo sino que con los atributos de los input en HTML
    //por ejemplo, required 
    $("#btnSubmit").on("click", function(){
        alert("Recuerda llenar todos los campos correctamente.");
    });

    $(".file-label-btn").hide();

    $(".file-label").on("mouseover", function(){
        $(".file-label-btn").css({
            "display":"flex"
        });
    });

    $(".file-label").on("mouseout", function(){
        $(".file-label-btn").hide();
    });
});

//FUNCIONES  ------------------------------------------------------------------------------------
//Funcion para actualizar la categoria
function actualizarSelectCategory(respuesta) {
    $("#sltCategorias").html(respuesta);
    $(".chosen-select").chosen().trigger("chosen:updated");
}

//Funcion para verificar el titulo con ajax
function verificarTituloEvento(){
    let idEvento = "";
    if($("#idEvento").length > 0){
        idEvento = $("#idEvento").val();
        console.log(idEvento);
    }
    $.post("../modelo/getCoincidenciasName.php", 
                {
                    "tituloEvento": $("#txtName").val(),
                    "idEvento": idEvento
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

//Funcion para dar la imagen de fondo del formulario
function changeBackgroundBody(urlImg = "https://www.esneca.com/wp-content/uploads/eventos-sociales-1200x720.jpg"){
    $(".form-body").css({
        "background-image": "url(" + urlImg + ")"
    });
}