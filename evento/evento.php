<?php

require_once('../controlador/queryEvent.php');
require_once('../controlador/querys.php');
require_once('../vista/menu_vista.php');
require_once('../modelo/form.class.php');
require_once('../modelo/table.class.php');
require_once('../modelo/eventCard_generator.php');
require_once('../controlador/session.php');
$rol = getRolSession(); //Todos pueden verlo pero solo algunas opciones estaran para los especiales
$userID = isset($_SESSION['iduser'])?$_SESSION['iduser']:"u"; 
$aQ = new Query(); 
$query = new QueryEvento();
$menu = new HTMLMENU(2, $rol);
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
$personas = $aQ->howManyUserinEvent($idEvento); 
$conf = $aQ->getUserStatusEvent($userID, $idEvento); 
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="fondo-opaco">
    <?php $menu->createMenu(); ?>
    <div class="div-contenido">
        <!-- Hidden -->
        <p style="display:none;" id="idEvento"><?php echo $idEvento; ?></p>
        <!-- -->
        <div class="tarjeta" style="background-image: url('<?php echo $evento['Banner'] ?>');">
            <div class="tarjeta-img" >
                <!--<img src="../<?php echo $evento['Banner'] ?>" id="imgEvento" >-->
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
                <div class="<?php echo strlen($evento["Descripcion"])>100?"tarjeta-contenido-descripcion":"" ?>">
                    <p><?php echo $evento["Descripcion"] ?></p>
                </div>
                <?php
                    $fechaInicio = date_format( date_create($evento["FechaInicio"]), 'Y-m-d' );
                    $fechaFin = date_format( date_create($evento["FechaFin"]), 'Y-m-d' );
                    $horaInicio = date_format( date_create($evento["FechaInicio"]), 'H:i' );
                    $horaFin = date_format( date_create($evento["FechaFin"]), 'H:i' );
                ?>
                <div class="tarjeta-row-2">
                    <?php if( $fechaInicio != $fechaFin ){ ?>
                    <div style="display:flex; flex-direction:column;">
                        <p><span class="bold">Fecha de inicio:</span> <?php echo $fechaInicio; ?></p>
                        <p><span class="bold">Hora:</span> <?php echo $horaInicio; ?></p>
                    </div>
                    <div style="display:flex; flex-direction:column;">
                        <p><span class="bold">Fecha de finalización:</span> <?php echo $fechaFin; ?></p>
                        <p><span class="bold">Hora:</span> <?php echo $horaFin; ?></p>
                    </div>
                    <?php }else{ ?>
                    <div>
                        <p><span class="bold">Fecha:</span> <?php echo $fechaInicio; ?></p>
                    </div>
                    <div>
                        <p><span class="bold">Hora:</span> <?php echo $horaInicio; ?> - <?php echo $horaFin; ?></p>
                    </div>
                    <?php } ?>
                </div>
                <div class="tarjeta-row-2">
                    <div>
                        <p><span class="bold">Tipo de evento:</span> <?php echo $evento["TipoEvento"]==1?"Público":"Privado"; ?></p>
                    </div>
                    <div>
                        <p><span class="bold">Máximo de personas: </span><?=$personas['COUNT(idUsuario)']?> |<?php echo $evento["MaximoPersonas"] ?></p>
                    </div>
                </div>
                <div class="tarjeta-botones">
                    <?php
                        if($rol == "3" && $conf!="Espera" && $conf!="Confirmado"){
                            echo "<div id='btn-enter' class='btn tarjeta-btn'><span class='icon-plus'></span> Sucribirse</div>"; 
                        }else if($rol == "3" && $conf=="Espera"){
                            echo "<div id='btn-conf' class='btn tarjeta-btn'><span class='icon-plus'></span> Confirmar asistencia</div>"; 
                        }else if($rol == "3" && $conf=="Confirmado"){
                            echo "<div id='btn-del' class='btn tarjeta-btn'><span class='icon-minus'></span>Cancelar suscripción</div>"; 
                        }
                    ?>
                    <a href="index.php" class="btn tarjeta-btn"><span class="icon-arrow-left"></span> Regresar</a>
                    <?php if( $rol != "u" && $rol != "3" ){ //Solo para creadores y admin ?>

                 
            
                    <a href="formEventos.php?idEvento=<?php echo $idEvento; ?>" class="btn tarjeta-btn"><span class="icon-edit"></span> Modificar</a>
                    <p class="btn tarjeta-btn" id="btnDelete"><span class="icon-x"></span> Eliminar</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <img src="<?php echo $evento['Banner'] ?>" alt="" style="display:none;">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.0/color-thief.umd.js"></script>
    
    <script src="js/color.js"></script>

    <?//hacer if?>
    <input type='hidden' id='user' value='<?=$userID?>'>
    <input type='hidden' id='event' value='<?=$idEvento?>'>
    <input type='hidden' id='type' value='<?=$evento["TipoEvento"]?>'>


    <script src="js/unirse_evento.js"></script>
</body>
</html>