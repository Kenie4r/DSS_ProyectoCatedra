<?php
require_once("conection.php");

class QueryEvento{
    public function getEventos(){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "SELECT * FROM evento";
        $sentencia= $connection->prepare($sql);

        if(!$sentencia){
            return null;
        }else{
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
            
        }
    }

    public function insertEvento($titulo, $descripcion, $fechaInicio, $fechaFin, $tipoEvento, $maximoPersonas, $banner){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "INSERT INTO evento (Titulo, Descripcion, FechaInicio, FechaFin, TipoEvento, MaximoPersonas, Banner) VALUES (:titulo, :d, :fechaI, :fechaF, :tipo, :maximoP, :banner)";
        $sentencia= $connection->prepare($sql);
        $sentencia->bindParam(":titulo", $titulo);
        $sentencia->bindParam(":d", $descripcion);
        $sentencia->bindParam(":fechaI", $fechaInicio);
        $sentencia->bindParam(":fechaF", $fechaFin);
        $sentencia->bindParam(":tipo", $tipoEvento);
        $sentencia->bindParam(":maximoP", $maximoPersonas);
        $sentencia->bindParam(":banner", $banner);
        if(!$sentencia){
            return false;
        }else{
            $sentencia->execute();
            return true;
        }
    }
}

?>