<?php
require_once('../controlador/queryEvent.php');

$query = new QueryEvento();
$tituloEvento = $_POST["tituloEvento"];
$idEvento = $_POST["idEvento"];

$categorias = $query->getEventoByNameAndId($tituloEvento, $idEvento);

//Options
if( $categorias == null ){
    echo "Sin coincidencias.";
}else{
    echo "Coincidencia encontrada.";
}

?>