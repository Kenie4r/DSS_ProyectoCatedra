<?php

require_once('../controlador/queryCategoria.php');
require_once('../vista/menu_vista.php');
require_once('../modelo/form.class.php');
require_once('../modelo/table.class.php');
require_once('../modelo/categCard_generator.php');
require_once('../controlador/session.php');
$rol = getRolSession(); //Todos pueden verlo pero solo algunas opciones estaran para los especiales

$query = new QueryEvento();
$menu = new HTMLMENU(1, $rol);
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
    <?php $menu->createMenu(); ?>
    <div class="div-contenido">
        <div class="contenedor-abuelo">
            <div class="contenedor-header">
                <div class="contenedor-titulo">
                    <h1>Categorias</h1>
                </div>
            </div>
            <div class="contenedor-card">
                <?php if( $rol == "1" || $rol == "2" ){ //Add ?>
                <div class="evento">
                    <a href="newCategoria.php">
                        <div class="titulo-mas">
                            <div class="icon"><span class="icon-plus"></span></div> 
                            <p class="mas-button">CREAR NUEVA CATEGORIA</p></div>
                    </a>
                </div>
                <?php } ?>
<?php
                
                
if(!($eventos == null)){
    foreach($eventos as $fila => $evento){

        $cardG->CreateCard($evento['Titulo'], $evento['Descripcion'], $evento['idCategoria'], $rol);
    }
}
?>
            </div>
        </div>
    </div>
</body>
</html>