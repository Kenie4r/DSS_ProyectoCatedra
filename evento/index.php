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

//Nueva funcionalidad
$categorias = $query->getCategorias();

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
    <?php $menu->createMenu(); ?>
    <div class="div-contenido">
        <div class="contenedor-abuelo">
            <div class="contenedor-header">
                <div class="contenedor-titulo">
                <?php if( $rol != "u" && $rol != "3" ){ //Solo para creadores y admin ?>
                    <h1>Mis eventos</h1>
                    <?php } ?>
                </div>
                <div class="contenedor-botones">
                    <?php if( $rol != "u" && $rol != "3" ){ //Solo para creadores y admin ?>
                    <a href="formEventos.php" class="btn btn-azul"><span class="icon-plus"></span> Nuevo</a>
                    <?php } ?>
                </div>
            </div>
            <div class="caja-filtro">
                        <select name="filtroCategorias" id="filtroCategorias">
                            <option value="">Selecciona una categoría</option>
                            <?php
                                foreach($categorias as $key => $categoria){
                            ?>
                            <option value="<?= $categoria["clave"] ?>"><?= $categoria["valor"] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                        <p id="btnFiltro" class="btn btn-azul">Filtrar</p>
            </div>
            <div class="contenedor-card">
                <?php if( $rol != "u" && $rol != "3" ){ //Solo para creadores y admin ?>
                <div class="evento">
                    <a href="formEventos.php">
                        <div class="titulo-mas">
                            <div class="icon"><span class="icon-plus"></span></div> 
                            <p class="mas-button">CREAR UN NUEVO EVENTO</p></div>
                    </a>
                </div>
                <?php } ?>
<?php
                
if(!($eventos == null)){
    foreach($eventos as $fila => $evento){
        //Solo se muestran eventos privados, si estas registrado
        if( $rol != "u" ){
            $cardG->CreateCard($evento['Titulo'], $evento['FechaInicio'], $evento['FechaFin'], $evento['MaximoPersonas'], $evento["Banner"], $evento['idEvento'], "evento.php");
        }else if( $rol == "u" && $evento["TipoEvento"] != 2 ){
            $cardG->CreateCard($evento['Titulo'], $evento['FechaInicio'], $evento['FechaFin'], $evento['MaximoPersonas'], $evento["Banner"], $evento['idEvento'], "evento.php");
        }
    }
}
?>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" integrity="sha512-yVvxUQV0QESBt1SyZbNJMAwyKvFTLMyXSyBHDO4BG5t7k/Lw34tyqlSDlKIrIENIzCl+RVUNjmCPG+V/GMesRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/scriptFiltro.js"></script>
</body>
</html>