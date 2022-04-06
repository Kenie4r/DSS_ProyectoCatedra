<?php

require_once('../controlador/queryEvent.php');
require_once('../vista/menu_vista.php');
require_once('../modelo/form.class.php');
require_once('../modelo/table.class.php');
require_once('../modelo/eventCard_generator.php');

$query = new QueryEvento();
$menu = new HTMLMENU(2);
$form = new Formulario();
$tabla = new Table();
$cardG = new eventCard(); 

$headers = array("ID", "Titulo", "Descripcion", "Fecha Inicio", "Fecha Fin", "Tipo Evento", "Maximo Personas", "Banner");
$body = $query->getEventos();
$eventos = $query->getEventos();
?>
<!DOCTYPE html>
<html lang="en">
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
                    <a href="newEvent.php" class="btn btn-azul"><span class="icon-plus"></span> Nuevo</a>
                </div>
            </div>
            <div class="contenedor-card">
                <div class="evento">
                    <a href="newEvent.php">
                        <div class="titulo-mas">
                            <div class="icon"><span class="icon-plus"></span></div> 
                            <p class="mas-button">CREAR UN NUEVO EVENTO</p></div>
                    </a>
                </div>
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