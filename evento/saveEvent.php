<?php
require_once('../controlador/queryEvent.php');
require_once('../vista/menu_vista.php');
require_once('../modelo/form.class.php');
require_once('../modelo/table.class.php');

$query = new QueryEvento();
$menu = new HTMLMENU(2);

$titulo = $_POST["txtName"];
$descripcion = $_POST["txtDescripcion"];
$fechaInicio = $_POST["dtFechaInicio"];
$fechaFin = $_POST["dtFechaFin"];
$tipoEvento = $_POST["sltTipo"];
$maximoPersonas = $_POST["nmbCantidadPersonas"];
$categorias = $_POST["sltCategorias"];
$banner = "https://www.esneca.com/wp-content/uploads/eventos-sociales-1200x720.jpg";

$resultado = $query->insertEvento($titulo, $descripcion, $fechaInicio, $fechaFin, $tipoEvento, $maximoPersonas, $banner);
$lastEvento = $query->getEventoByName($titulo);
$idLast = $lastEvento[0]["IdEvento"];

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
<?php
$resultado = true;
//Se comprueba que se guardara el evento
if($resultado){
    //Se ingresan las relaciones evento-categoria
    $errorresCategoria = 0;
    foreach($categorias as $key => $value){
        $resultC = $query->insertEventoAndCategoria($idLast, $value);
        //Se verifica si se guardaron
        if(!$resultC){
            $errorresCategoria++;
        }
    }

    if($errorresCategoria > 0){
?>
        <div class="resultado-titulo">
            <p class="resultado-titulo-error"><span class="icon-alert-circle"></span> <span class="bold">ERROR:</span> No se pudo crear el evento.</p>
        </div>
<?php
    }else{
?>
        <div class="resultado-titulo">
            <p class="resultado-titulo-success"><span class="icon-thumbs-up"></span> Se creo el evento.</p>
        </div>
<?php
    }
}else{
?>
        <div class="resultado-titulo">
            <p class="resultado-titulo-error"><span class="icon-alert-circle"></span> <span class="bold">ERROR:</span> No se pudo crear el evento.</p>
        </div>
<?php
}

?>
            <div class="resultado-boton">
                <a href="index.php" class="btn btn-azul"><span class="icon-arrow-left-circle"></span> Inicio</a>
            </div>
        </div>
    </div>
</body>
</html>