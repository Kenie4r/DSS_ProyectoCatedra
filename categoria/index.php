<?php

require_once('../controlador/queryCategoria.php');
require_once('../vista/menu_vista.php');
require_once('../modelo/form.class.php');
require_once('../modelo/table.class.php');
require_once('../modelo/categCard_generator.php');

$query = new QueryEvento();
$menu = new HTMLMENU(2);
$form = new Formulario();
$tabla = new Table();
$cardG = new eventCard(); 

$headers = array("ID", "Titulo", "Descripcion");
$body = $query-> getCate();
$eventos = $query-> getCate();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link rel="stylesheet" href="../css/menu.style.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="../css/icomoon/style.css">
    <link rel="stylesheet" href="css/style.categoria.css">
</head>
<body>
    <div class="div-menu">
    <?php $menu->createMenu(); ?>
    </div>
    <div class="div-contenido">
        <div class="contenedor-abuelo">
            <div class="contenedor-header">
                <div class="contenedor-titulo">
                    <h1>Categorias</h1>
                </div>
            </div>
            <div class="contenedor-card">
                <div class="evento">
                    <a href="newCategoria.php">
                        <div class="titulo-mas">
                            <div class="icon"><span class="icon-plus"></span></div> 
                            <p class="mas-button">CREAR NUEVA CATEGORIA</p></div>
                    </a>
                </div>
<?php
                
                
if(!($eventos == null)){
    foreach($eventos as $fila => $evento){

        $cardG->CreateCard($evento['Titulo'], $evento['Descripcion'], $evento['idCategoria']);
    }
}
?>
            </div>
        </div>
    </div>
</body>
</html>