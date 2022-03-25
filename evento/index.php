<?php

require_once('../vista/menu_vista.php');
require_once('../modelo/form.class.php');

$menu = new HTMLMENU(2);
$form = new Formulario();

$opciones = array(
    0 => "Publico",
    1 => "Privado"
)

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
        <form action="" method="post">
            <?php echo $form->textbox('nombre'); ?>
            <?php echo $form->number('Personas'); ?>
            <?php echo $form->textarea('Descripcion'); ?>
            <?php echo $form->date('Date'); ?>
            <?php echo $form->select('Tipos', $opciones); ?>

        </form>
    </div>
</body>
</html>