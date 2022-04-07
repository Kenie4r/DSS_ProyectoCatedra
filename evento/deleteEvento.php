<?php
require_once('../vista/menu_vista.php');
require_once('../modelo/evento.class.php');
require_once('../controlador/session.php');
onlyAdmin(); //Solo los admins pueden eliminar
$rol = getRolSession(); //Puede ser vista por todos, pero las opciones especiales solo para admin o creadores

$menu = new HTMLMENU(2, $rol);
if( isset($_GET['idEvento']) ){
    $id = $_GET['idEvento'];
}
$operacion = "crear";
$titulo = "Nuevo evento";
$nameEvento = "Nuevo Evento";
$fechaInicio = "";
$fechaFin = "";
$tipoEvento = "";
$maximoPersonas = "";
$descripcion = "¡Describe tu evento!";
$urlBack = "index.php";
$banner = "https://www.esneca.com/wp-content/uploads/eventos-sociales-1200x720.jpg";
$categorias = "";
$evento = new Evento($id, $titulo, $descripcion, $fechaInicio, $fechaFin, $tipoEvento, $maximoPersonas, $banner, $categorias);
$resultado2 = $evento->deleteUsuarios();
$resultado3 = $evento->deleteCategorias();
$resultado1 = $evento->delete();
if($resultado1 && $resultado2 && $resultado3){
    $mensaje = "<p class=\"resultado-titulo-success\"><span class=\"icon-thumbs-up\"></span> Se elimino el evento.</p>";
}else{
    $mensaje = "<p class=\"resultado-titulo-error\"><span class=\"icon-alert-circle\"></span> <span class=\"bold\">ERROR:</span> No se pudo eliminar el evento.</p>";
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar evento</title>
    <link rel="stylesheet" href="../css/menu.style.css">
    <link rel="stylesheet" href="css/style.evento.css">
    <link rel="stylesheet" href="../css/icomoon/style.css">
</head>
<body>
    <div class="div-menu">
        <?php $menu->createMenu(); ?>
    </div>
    <div class="div-contenido">
        <div class="contenedor-abuelo">
            <div class="resultado-titulo">
                <?php echo $mensaje; ?>
            </div>
            <div class="resultado-boton">
                <a href="<?php echo $urlBack; ?>" class="btn btn-azul"><span class="icon-arrow-left-circle"></span> Inicio</a>
            </div>
        </div>
    </div>
</body>
</html>