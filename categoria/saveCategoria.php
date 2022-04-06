<?php
require_once('../vista/menu_vista.php');
require_once('../modelo/categ.class.php');

$menu = new HTMLMENU(2);

if(isset($_POST["btnSubmit"])){
    //Operacion
    $operacion = $_POST["btnSubmit"];
    //Id evento
    if(isset($_POST["idCategoria"])){
        $id = $_POST["idCategoria"];
    }else{
        $id = "";
    }
    //Propiedades
    $titulo = $_POST["txtName"];
    $descripcion = $_POST["txtDescripcion"];
    //Evento
    $evento = new Categoria($id, $titulo, $descripcion);

    //Operaciones
    switch($operacion){
        case "crear":
            $resultado1 = $evento->insert(); //Guardamos el evento
            $evento->recuperarID(); //Recuperamos el id del evento ingresado
            //
            if($resultado1 != null){
                $mensaje = "<p class=\"resultado-titulo-success\"><span class=\"icon-thumbs-up\"></span> Se creo la categoria.</p>";
            }else{
                $mensaje = "<p class=\"resultado-titulo-error\"><span class=\"icon-alert-circle\"></span> <span class=\"bold\">ERROR:</span> No se pudo crear la categoria</p>";
            }
            break;
    }
}else{
    //Redirect
    $mensaje = "<p class=\"resultado-titulo-error\"><span class=\"icon-alert-circle\"></span> <span class=\"bold\">ERROR:</span> Algo salio muy mal.</p>";
}

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
                <a href="index.php" class="btn btn-azul"><span class="icon-arrow-left-circle"></span> Inicio</a>
            </div>
        </div>
    </div>
</body>
</html>