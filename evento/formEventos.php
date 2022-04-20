<?php
require_once('../controlador/queryEvent.php');
require_once('../vista/menu_vista.php');
require_once('../modelo/form.class.php');
require_once('../modelo/table.class.php');
require_once('../controlador/session.php');
onlyCreadores(); //Solo los creadores y admin pueden ver esto
$rol = getRolSession(); //Puede ser vista por todos, pero las opciones especiales solo para admin o creadores

$query = new QueryEvento();
$menu = new HTMLMENU(2, $rol);
$form = new Formulario();

$tiposEventos = $query->getTipoEventos();
$categorias = $query->getCategorias();

if( isset($_GET['idEvento']) ){
    $idEvento = $_GET['idEvento'];
    $titulo = "Modificar evento";
    $operacion = "modificar";
    $urlBack = "evento.php?idEvento=" . $idEvento;
    $update = true;
    $evento = $query->getEventoByID($idEvento);
    $categoriasEvento = $query->getCategoriasByIDEvento($idEvento);
    $nameEvento = $evento['Titulo'];
    $fechaInicio = $evento['FechaInicio'];
    $fechaFin = $evento['FechaFin'];
    $tipoEvento = $evento['TipoEvento'];
    $maxPersonas = $evento['MaximoPersonas'];
    $bannerEvento = $evento['Banner'];
    $descripcionEvento = $evento['Descripcion'];
}else{
    $update = false;
    $operacion = "crear";
    $titulo = "Nuevo evento";
    $nameEvento = "Nuevo Evento";
    $fechaInicio = "";
    $fechaFin = "";
    $tipoEvento = "";
    $maxPersonas = "";
    $descripcionEvento = "¡Describe tu evento!";
    $urlBack = "index.php";
    $bannerEvento = "https://www.esneca.com/wp-content/uploads/eventos-sociales-1200x720.jpg";
    $categoriasEvento = "";
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
    <link rel="stylesheet" href="../css/menu.style.css">
    <link rel="stylesheet" href="../css/icomoon/style.css">
    <link rel="stylesheet" href="css/style.evento.css">
</head>
<body>
    <?php $menu->createMenu(); ?>
    <div class="div-contenido">
        <form action="saveEvent.php" name="frmNewEvent" method="post" class="form" enctype="multipart/form-data">
            <div class="form-header">
                <?php echo $form->textboxPersonalizado_Titulo("txtName", "¿Cómo se llama tu evento?", $nameEvento, 1); ?>
                <div class="form-header-button">
                    <?php echo $form->buttonSubmit("btnSubmit", $operacion); ?>
                    <a href="#" class="btn btn-azul"><span class="icon-image"></span> Previsualizar</a>
                    <?php echo $form->buttonCancel($urlBack); ?>
                </div>
            </div>
            <div class="form-input">
                <?php echo $form->datetime("dtFechaInicio", "Fecha de inicio:", "¿Cuándo empezará tu evento?", 1, "", $fechaInicio); ?>
                <?php echo $form->datetime("dtFechaFin", "Fecha de fin:", "¿Cuándo terminará tu evento?", 1, "", $fechaFin); ?>
                <?php echo $form->select("sltTipo", "Tipo de evento:", $tiposEventos, "¿Qué tipo de evento es?", 1, "", $tipoEvento); ?>
                <div class="contenedor-input-doble">
                    <?php echo $form->number("nmbCantidadPersonas", "Cantidad de personas:", "¿Cuántas personas asistirán al evento?", 1, 0, 1, "", 1, $maxPersonas); ?>
                    <?php echo $form->selectPersonalizado_Categoria("sltCategorias", "sltCategorias[]", "Categorías del evento:", $categorias, "¿Cómo es tu evento?", 1, "", $categoriasEvento); ?>
                </div>
                <?php echo $form->fileIMG("fileEvento", "imgEvento", $bannerEvento, "Banner del evento:", 1); ?>
                <?php echo $form->textarea("txtDescripcion", "Describe tu evento:", $descripcionEvento); ?>
                <?php if($update) { echo $form->hidden("idEvento", $idEvento); } ?>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" integrity="sha512-yVvxUQV0QESBt1SyZbNJMAwyKvFTLMyXSyBHDO4BG5t7k/Lw34tyqlSDlKIrIENIzCl+RVUNjmCPG+V/GMesRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/scriptEvento.js"></script>
</body>
</html>