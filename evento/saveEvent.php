<?php
require_once('../vista/menu_vista.php');
require_once('../modelo/evento.class.php');
require_once('../controlador/session.php');
onlyCreadores(); //Solo los creadores y admins pueden crear y modificar
$rol = getRolSession(); //Puede ser vista por todos, pero las opciones especiales solo para admin o creadores

$menu = new HTMLMENU(2, $rol);

if(isset($_POST["btnSubmit"])){
    //Operacion
    $operacion = $_POST["btnSubmit"];
    //Id evento
    if(isset($_POST["idEvento"])){
        $id = $_POST["idEvento"];
    }else{
        $id = "";
    }
    //Propiedades
    $titulo = $_POST["txtName"];
    $descripcion = $_POST["txtDescripcion"];
    $fechaInicio = $_POST["dtFechaInicio"];
    $fechaFin = $_POST["dtFechaFin"];
    $tipoEvento = $_POST["sltTipo"];
    $maximoPersonas = $_POST["nmbCantidadPersonas"];
    //Banner
    if(isset($_FILES['fileEvento'])){ //Siempre existe
        $randon = rand(1,20);
        //Se traen los datos del file
        $banner = ""; //Default
        $banner_tmp_name = $_FILES["fileEvento"]["tmp_name"]; //Nombre en memoria
        $banner_name = $_FILES["fileEvento"]["name"]; //Nombre del archivo
        $banner_size = $_FILES["fileEvento"]["size"]; //Size del archivo
        //Tamaño
        if($banner_size > 2621440){
            $bannerErrorSize = true;
            $banner = "https://www.esneca.com/wp-content/uploads/eventos-sociales-1200x720.jpg";
        }
        //No modificar al actualizar
        if($banner_size == 0 && $operacion == "modificar"){
            $banner = ""; //No se trae el banner porque no se desea modificar
        }
        //No modificar al crear
        if($banner_size == 0 && $operacion == "crear"){
            $banner = "https://www.esneca.com/wp-content/uploads/eventos-sociales-1200x720.jpg"; //No se trae el banner porque no se desea modificar
        }
        if( $banner != "" || $banner != "https://www.esneca.com/wp-content/uploads/eventos-sociales-1200x720.jpg"){
            if(move_uploaded_file($banner_tmp_name, "banners/" . $randon . "_" .  utf8_decode($banner_name))){
                $banner = "../evento/banners/" . $randon . "_" . $banner_name;
            }
        }
    }
    $categorias = isset($_POST["sltCategorias"])?$_POST["sltCategorias"]:array();
    //Evento
    $evento = new Evento($id, $titulo, $descripcion, $fechaInicio, $fechaFin, $tipoEvento, $maximoPersonas, $banner, $categorias);

    //Operaciones
    switch($operacion){
        case "crear":
            $urlBack = "index.php";
            $resultado1 = $evento->insert(); //Guardamos el evento
            $evento->recuperarID(); //Recuperamos el id del evento ingresado
            $resultado2 = is_array($categorias)?$evento->insertCategory():true;
            if($resultado1 && $resultado2){
                $mensaje = "<p class=\"resultado-titulo-success\"><span class=\"icon-thumbs-up\"></span> Se creo el evento.</p>";
            }else{
                $mensaje = "<p class=\"resultado-titulo-error\"><span class=\"icon-alert-circle\"></span> <span class=\"bold\">ERROR:</span> No se pudo crear el evento.</p>";
            }
            break;
        case "modificar":
            $urlBack = "evento.php?idEvento=" . $id;
            $resultado1 = $evento->update(); //Guardamos el evento
            $resultado2 = $evento->updateCategory();
            if($resultado1 && $resultado2){
                $mensaje = "<p class=\"resultado-titulo-success\"><span class=\"icon-thumbs-up\"></span> Se actualizo el evento.</p>";
            }else{
                $mensaje = "<p class=\"resultado-titulo-error\"><span class=\"icon-alert-circle\"></span> <span class=\"bold\">ERROR:</span> No se pudo actualizar el evento.</p>";
            }
            if(isset($bannerErrorSize)){
                $mensaje .= "Nota: El banner sobrepaso el tama;o del server.";
            }
            break;
    }
}else{
    //Redirect
    $mensaje = "<p class=\"resultado-titulo-error\"><span class=\"icon-alert-circle\"></span> <span class=\"bold\">ERROR:</span> Algo salio muy mal.</p>";
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar evento</title>
    <link rel="stylesheet" href="../css/menu.style.css">
    <link rel="stylesheet" href="css/style.evento.css">
    <link rel="stylesheet" href="../css/icomoon/style.css">
</head>
<body>
    <?php $menu->createMenu(); ?>
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