<?php
require_once('../controlador/queryEvent.php');

$query = new QueryEvento();

$tituloCategoria = $_POST["titulo"];

$resultado = $query->insertCategory($tituloCategoria);

if($resultado){
    echo "Se agrego la categoría correctamente";
}else{
    echo "ERROR: No se agrego la categoria.";
}

?>