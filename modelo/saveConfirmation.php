<?php
    require_once("../controlador/conection.php"); 
    require_once("../controlador/querys.php"); 
    $idUsuario = $_POST['idUser']; 
    $idEvento = $_POST['eventID']; 
    $dbHandler = new Query(); 
    echo $dbHandler->InsertEventUserC($idUsuario, $idEvento,"Espera"); 
    header("Location: ../dashboard/index.php"); 
?>