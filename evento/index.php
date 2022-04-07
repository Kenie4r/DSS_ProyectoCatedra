<?php

require_once('../controlador/queryEvent.php');
require_once('../vista/menu_vista.php');
require_once('../modelo/form.class.php');
require_once('../modelo/table.class.php');
require_once('../modelo/eventCard_generator.php');
require_once('../controlador/session.php');
$rol = getRolSession(); //Puede ser vista por todos, pero las opciones especiales solo para admin o creadores

$query = new QueryEvento();
$menu = new HTMLMENU(2, $rol);
$form = new Formulario();
$tabla = new Table();
$cardG = new eventCard(); 

$headers = array("ID", "Titulo", "Descripcion", "Fecha Inicio", "Fecha Fin", "Tipo Evento", "Maximo Personas", "Banner");
if( isset($_GET['idCategoria']) ){
    $eventos = $query->getEventosByCategoria($_GET['idCategoria']);
}else{
    $eventos = $query->getEventos();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis eventos</title>
    <link rel="stylesheet" href="../css/menu.style.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/icomoon/style.css">
    <link rel="stylesheet" href="css/style.evento.css">
</head>
<body>
    <div class="div-menu">
        <?php $menu->createMenu(); ?>
    </div>
    <div class="div-contenido">
        <div class="contenedor-abuelo">
            <div class="contenedor-header">
                <div class="contenedor-titulo">
                    <h1>Mis eventos</h1>
                </div>
                <div class="contenedor-botones">
                    <?php if( $rol != "u" && $rol != "3" ){ //Solo para creadores y admin ?>
                    <a href="formEventos.php" class="btn btn-azul"><span class="icon-plus"></span> Nuevo</a>
                    <?php } ?>
                </div>
            </div>
            <div class="contenedor-card">
                <?php if( $rol != "u" && $rol != "3" ){ //Solo para creadores y admin ?>
                <div class="evento">
                    <a href="newEvent.php">
                        <div class="titulo-mas">
                            <div class="icon"><span class="icon-plus"></span></div> 
                            <p class="mas-button">CREAR UN NUEVO EVENTO</p></div>
                    </a>
                </div>
                <?php } ?>
<?php
                
if(!($eventos == null)){
    foreach($eventos as $fila => $evento){

        
        $cardG->CreateCard($evento['Titulo'], $evento['FechaInicio'], $evento['FechaFin'], $evento['MaximoPersonas'], $evento["Banner"], $evento['idEvento'], "evento.php");
    }
}
?>
            </div>
        </div>
    </div>
</body>
</html>