<?php
require_once('../vista/menu_vista.php');
require_once('../modelo/evento.class.php');

$menu = new HTMLMENU(2);

if(isset($_POST["btnSubmit"])){
    //Operacion
    $operacion = $_POST["btnSubmit"];
    //Id evento
    if(isset($_POST["idEvento"])){
        $id = $_POST["idEvento"];
    }else{
        $id = "";
    }
    //Propiedades
    $titulo = $_POST["txtName"];
    $descripcion = $_POST["txtDescripcion"];
    $fechaInicio = $_POST["dtFechaInicio"];
    $fechaFin = $_POST["dtFechaFin"];
    $tipoEvento = $_POST["sltTipo"];
    $maximoPersonas = $_POST["nmbCantidadPersonas"];
    $banner = "https://www.esneca.com/wp-content/uploads/eventos-sociales-1200x720.jpg";
    $categorias = $_POST["sltCategorias"];
    //Evento
    $evento = new Evento($id, $titulo, $descripcion, $fechaInicio, $fechaFin, $tipoEvento, $maximoPersonas, $banner, $categorias);

    //Operaciones
    switch($operacion){
        case "crear":
            $resultado1 = $evento->insert(); //Guardamos el evento
            $evento->recuperarID(); //Recuperamos el id del evento ingresado
            $resultado2 = $evento->insertCategory();
            //
            if($resultado1 && $resultado2){
                $mensaje = "<p class=\"resultado-titulo-success\"><span class=\"icon-thumbs-up\"></span> Se creo el evento.</p>";
            }else{
                $mensaje = "<p class=\"resultado-titulo-error\"><span class=\"icon-alert-circle\"></span> <span class=\"bold\">ERROR:</span> No se pudo crear el evento.</p>";
            }
            break;
    }
}else{
    //Redirect
    $mensaje = "<p class=\"resultado-titulo-error\"><span class=\"icon-alert-circle\"></span> <span class=\"bold\">ERROR:</span> Algo salio muy mal.</p>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis eventos</title>
    <link rel="stylesheet" href="../css/menu.style.css">
    <link rel="stylesheet" href="css/style.evento.css">
    <link rel="stylesheet" href="../css/icomoon/style.css">
</head>
<body>
    <div class="div-menu">
        <?php $menu->createMenu(); ?>
    </div>
    <div class="div-contenido">
        <div class="contenedor-abuelo">
            <div class="resultado-titulo">
                <?php echo $mensaje; ?>
            </div>
            <div class="resultado-boton">
                <a href="index.php" class="btn btn-azul"><span class="icon-arrow-left-circle"></span> Inicio</a>
            </div>
        </div>
    </div>
</body>
</html>