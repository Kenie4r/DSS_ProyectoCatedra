<?php
require_once('../controlador/queryEvent.php');

$query = new QueryEvento();

$tituloCategoria = $_POST["titulo"];

$resultado = $query->insertCategory($tituloCategoria);

if($resultado){
    $categorias = $query->getCategorias();

    //Options
    $options = "<option value=\"\"></option> ";
    if(count($categorias) > 0){
        foreach($categorias as $fila => $columna){
            $options .= "<option value=\"" . $columna['clave'] . "\">" . $columna['valor'] . "</option>";
        }
    }

    echo $options;
}else{
    echo null;
}

?>