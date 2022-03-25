<?php
require_once("conection.php");

class Query{
    public function getEventos(){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "SELECT * FROM eventos";
        $sentencia= $connection->prepare($sql);

        if(!$sentencia){
            return "Error";
        }else{
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
            
        }
    }
}

?>