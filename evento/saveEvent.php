<?php
require_once('../controlador/queryEvent.php');
require_once('../vista/menu_vista.php');
require_once('../modelo/form.class.php');
require_once('../modelo/table.class.php');

$query = new QueryEvento();
$menu = new HTMLMENU(2);

echo $_POST["txtName"];
echo $_POST["dtFechaInicio"];
echo $_POST["dtFechaFin"];
echo $_POST["sltTipo"];
echo $_POST["nmbCantidadPersonas"];
echo $_POST["txtDescripcion"];
echo "Categoria";
echo "Imagen";

$titulo = $_POST["txtName"];
$descripcion = $_POST["txtDescripcion"];
$fechaInicio = $_POST["dtFechaInicio"];
$fechaFin = $_POST["dtFechaFin"];
$tipoEvento = $_POST["sltTipo"];
$maximoPersonas = $_POST["nmbCantidadPersonas"];
$banner = "https://www.esneca.com/wp-content/uploads/eventos-sociales-1200x720.jpg";

$resultado = $query->insertEvento($titulo, $descripcion, $fechaInicio, $fechaFin, $tipoEvento, $maximoPersonas, $banner);

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
<?php

if($resultado){
    echo "bien";
}

?>
            <a href="index.php">Listo</a>
        </div>
    </div>
</body>
</html>