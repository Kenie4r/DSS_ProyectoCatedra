$(document).ready(function () {
    //Chosen ----------------------------------------------------------------------------------
    //Activamos el chosen, es decir, el select de las categorias
    $(".chosen-select").chosen({
        no_results_text: "No hay categorías con el nombre: ",
        max_selected_options: 10
    });

    //New Category ----------------------------------------------------------------------------
    //Ocultamos el form para la nueva categoria
    hideFormNewCategoria();

    //Configuramos este boton para que aparezca el formulario
    $("#btnNewCategory").click(function(){
        $("#frmNewCategory").fadeIn("slow");
    });

    //Ocultamos el formulario
    $("#cancelNewCategory").click(function(){
        hideFormNewCategoria();
    });

    //Guardamos la nueva categoria
    $("#saveNewCategory").click(function(){
        saveNewCategory();
    });

    //Banner ----------------------------------------------------------------------------------
    //Cada que se modifique el input file, nosotros previsualiremos la imagen
    $("input[type='file']").change(function(e){
        let filename = e.target.files[0]; //Leemos el primer file
        let reader = new FileReader(); //Creamos un file reader
        //Cada que se cargue algo en el reader modificaremos el src de la imagen
        reader.onload = function(e) {
            $("#imgEvento").attr('src', e.target.result);
        }
        reader.readAsDataURL(filename); //Leemos el primer file y se lo pasamos al file reader
    })

    //Ocultamos el "Nuevo banner"
    hideLabelBanner();

    $(".file-label").on("mouseover", function(){
        $(".file-label-btn").css({
            "display":"flex"
        });
    });

    $(".file-label").on("mouseout", function(){
        hideLabelBanner();
    });

    //Validaciones ----------------------------------------------------------------------------
    //Verificamos el titulo, al iniciar la pagina
    verificarTituloEvento();

    //Verificamos el titulo, al escribir en el input
    $("#txtName").on("input", function(){
        verificarTituloEvento();
    });

    //Verificamos la cantidad de personas, cada que se modifique
    $("#nmbCantidadPersonas").on("input", function(){
        verificarMaximoPersonas();
    });

    //Verificamos la cantidad de personas, cada que se modifique
    $("#sltTipo").on("input", function(){
        verificarTipoEvento();
    });

    //Si el boton submit esta habilitado, le ponemos un mensaje para decir que se deben de llenar las cosas bien
    //porque los input no se validan con codigo sino que con los atributos de los input en HTML
    //por ejemplo, required 
    $("#btnSubmit").on("click", function(){
        alert("Recuerda llenar todos los campos correctamente.");
    });
});

//FUNCIONES  ------------------------------------------------------------------------------------
//Funcion para ocultar el formulario de nueva categoria
function hideFormNewCategoria(){
    $("#frmNewCategory").hide();
}

//Funcion para guardar la categoria en la BDD
function saveNewCategory(){
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
}

//Funcion para actualizar la categoria
function actualizarSelectCategory(respuesta) {
    $("#sltCategorias").html(respuesta);
    $(".chosen-select").chosen().trigger("chosen:updated");
}

//Funcion para ocultar el "Nuevo banner"
function hideLabelBanner(){
    $(".file-label-btn").hide();
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

//Funcion para verificar la cantidad de personas que asistiran al evento
function verificarMaximoPersonas(){
    let maxPersonas = $("#nmbCantidadPersonas").val();
    console.log(maxPersonas);
}

//Funcion para verificar el tipo de evento
function verificarTipoEvento(){
    let tipoEvento = $("#sltTipo").val();
    console.log(tipoEvento);
}