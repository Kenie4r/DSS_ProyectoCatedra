<?php

require_once('../controlador/query.php');
require_once('../vista/menu_vista.php');
require_once('../modelo/form.class.php');
require_once('../modelo/table.class.php');

$query = new Query();
$menu = new HTMLMENU(2);
$form = new Formulario();
$tabla = new Table();

$opciones = array(
    0 => "Publico",
    1 => "Privado"
);

$headers = array("ID", "Titulo", "Descripcion", "Fecha Inicio", "Fecha Fin", "Tipo Evento", "Maximo Personas", "Banner");
$body = $query->getEventos();
echo count($body);

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
        <!--<form action="" method="post">
            <?php echo $form->textbox('Nombre', "Escribe tu nombre...", 1, 1); ?>
            <?php echo $form->number('Personas', "Digite la cantidad de personas.."); ?>
            <?php echo $form->textarea('Descripcion', "Descripcion por defecto..."); ?>
            <?php echo $form->date('Date'); ?>
            <?php echo $form->select('Tipos', $opciones, "Seleccione un tipo de evento"); ?>
        </form>-->
        <?php $tabla->createTable($headers, $body, count($headers)); ?>
    </div>
</body>
</html>