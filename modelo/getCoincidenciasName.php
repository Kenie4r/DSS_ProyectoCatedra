<?php
require_once('../controlador/queryEvent.php');

$tituloEvento = $_POST["tituloEvento"];

$query = new QueryEvento();
$categorias = $query->getEventoByName($tituloEvento);

//Options
if( $categorias == null ){
    echo "Sin coincidencias.";
}else{
    echo "Coincidencia encontrada.";
}

?>