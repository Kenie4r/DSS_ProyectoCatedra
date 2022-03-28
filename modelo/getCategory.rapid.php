<?php
require_once('../controlador/queryEvent.php');

$query = new QueryEvento();
$categorias = $query->getCategorias();

//Options
$options = "<option value=\"\"></option> ";
if(count($categorias) > 0){
    foreach($categorias as $fila => $columna){
        $options .= "<option value=\"" . $columna['clave'] . "\">" . $columna['valor'] . "</option>";
    }
}

echo $options;

?>