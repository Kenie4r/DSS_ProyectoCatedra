<?php

require_once('../controlador/queryEvent.php');
require_once('../vista/menu_vista.php');
require_once('../modelo/form.class.php');
require_once('../modelo/table.class.php');
require_once('../modelo/eventCard_generator.php');
require_once('../controlador/session.php');
$rol = getRolSession(); //Todos pueden verlo pero solo algunas opciones estaran para los especiales

$query = new QueryEvento();
$menu = new HTMLMENU(2);
$form = new Formulario();
$tabla = new Table();
$cardG = new eventCard(); 

if(isset($_GET['idEvento'])){
    $idEvento = $_GET['idEvento']; 
}else{
    header("location:../evento/index.php");
}

$evento = $query->getEventoByID($idEvento);
$categorias = $query->getCategoriasByIDEvento($idEvento);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento</title>
    <link rel="stylesheet" href="../css/menu.style.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/icomoon/style.css">
    <link rel="stylesheet" href="css/style.evento.css">
</head>
<body class="fondo-opaco">
    <?php $menu->createMenu(); ?>
    <div class="div-contenido">
        <p style="display:none;" id="idEvento"><?php echo $idEvento; ?></p>
        <div class="tarjeta" style="background-image: url('<?php echo $evento['Banner'] ?>');">
            <div class="tarjeta-img" >
                <!--<img src="../<?php echo $evento['Banner'] ?>" alt="..." >-->
            </div>
            <div class="tarjeta-contenido">
                <div>
                    <h2><?php echo $evento["Titulo"] ?></h2>
                </div>
                <div class="tarjeta-categorias">
                    <?php foreach($categorias as $key => $categoria){
                    ?>
                    <div>
                        <p class="tarjeta-categoria-p"><?php echo is_array($categoria)?$categoria['Titulo']:$categoria; ?></p>
                    </div>
                    <?php } ?>
                </div>
                <div>
                    <p><?php echo $evento["Descripcion"] ?></p>
                </div>
                <div class="tarjeta-row-2">
                    <div>
                        <p><span class="bold">Fecha de inicio:</span> <?php echo $evento["FechaInicio"] ?></p>
                    </div>
                    <div>
                        <p><span class="bold">Fecha de finalización:</span> <?php echo $evento["FechaFin"] ?></p>
                    </div>
                </div>
                <div class="tarjeta-row-2">
                    <div>
                        <p><span class="bold">Tipo de evento:</span> <?php echo $evento["TipoEvento"] ?></p>
                    </div>
                    <div>
                        <p><span class="bold">Máximo de personas:</span> <?php echo $evento["MaximoPersonas"] ?></p>
                    </div>
                </div>
                <div class="tarjeta-botones">
                    <a href="index.php" class="btn btn-azul"><span class="icon-arrow-left"></span> Regresar</a>
                    <?php if( $rol != "u" && $rol != "3" ){ //Solo para creadores y admin ?>
                    <!--<a href="index.php" class="btn btn-azul"><span class="icon-user-plus"></span> Unirme</a>-->
                    <a href="formEventos.php?idEvento=<?php echo $idEvento; ?>" class="btn btn-green"><span class="icon-edit"></span> Modificar</a>
                    <p class="btn btn-red" id="btnDelete"><span class="icon-x"></span> Eliminar</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <img src="<?php echo $evento['Banner'] ?>" alt="" style="display:none;">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.0/color-thief.umd.js"></script>
    <script src="js/color.js"></script>
</body>
</html>