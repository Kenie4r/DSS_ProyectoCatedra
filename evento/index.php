<?php

require_once('../controlador/queryEvent.php');
require_once('../vista/menu_vista.php');
require_once('../modelo/form.class.php');
require_once('../modelo/table.class.php');

$query = new QueryEvento();
$menu = new HTMLMENU(2);
$form = new Formulario();
$tabla = new Table();

$headers = array("ID", "Titulo", "Descripcion", "Fecha Inicio", "Fecha Fin", "Tipo Evento", "Maximo Personas", "Banner");
$body = $query->getEventos();
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
                    <a href="newEvent.php">+ Nuevo</a>
                </div>
            </div>
            <?php $tabla->createTable($headers, $body, count($headers)); ?>
        </div>
    </div>
</body>
</html>