<?php

require_once('../controlador/queryCategoria.php');
require_once('../vista/menu_vista.php');
require_once('../modelo/form.class.php');
require_once('../modelo/table.class.php');
require_once('../controlador/session.php');
onlyCreadores(); //Solo creadores y admins pueden ver esto
$rol = getRolSession(); //Todos pueden verlo pero solo algunas opciones estaran para los especiales

$query = new QueryEvento();
$menu = new HTMLMENU(2, $rol);
$form = new Formulario();


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo evento</title>
    <link rel="stylesheet" href="../css/menu.style.css">
    <link rel="stylesheet" href="../css/icomoon/style.css">
    <link rel="stylesheet" href="css/style.categoria.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <div class="div-menu">
        <?php $menu->createMenu(); ?>
    </div>
    <div class="div-contenido">
        <form action="saveCategoria.php" name="frmNewEvent" method="post" class="form">
            <div class="form-header">
                <?php echo $form->textboxPersonalizado_Titulo("txtName", "Titulo de la Categoria", "", 1); ?>
                <div class="form-header-button">
                    <?php echo $form->buttonSubmit("btnSubmit", "crear"); ?>
                    <?php echo $form->buttonCancel("index.php"); ?>
                </div>
            </div>
            <div class="form-input">
                <?php echo $form->textarea("txtDescripcion", "Describe tu categoria:", ""); ?>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" integrity="sha512-yVvxUQV0QESBt1SyZbNJMAwyKvFTLMyXSyBHDO4BG5t7k/Lw34tyqlSDlKIrIENIzCl+RVUNjmCPG+V/GMesRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/script.js"></script>
</body>
</html>