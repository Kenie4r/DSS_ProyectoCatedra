<?php
require_once("conection.php");

class QueryEvento{
    public function insertCategoria($titulo, $descripcion){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "INSERT INTO categoria (Titulo, Descripcion) VALUES (:titulo, :d)";
        $sentencia= $connection->prepare($sql);
        $sentencia->bindParam(":titulo", $titulo);
        $sentencia->bindParam(":d", $descripcion);
        if(!$sentencia){
            return false;
        }else{
            $sentencia->execute();
            return true;
        }
    }
    /*----------------------------------------------------------------------------------------------
    ----------------------------------------- CATEGORIAS ------------------------------------------
    -----------------------------------------------------------------------------------------------*/
    public function getCategorias(){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "SELECT idCategoria AS 'clave', Titulo AS 'valor', Descripcion AS 'cuerpo' FROM categoria";
        $sentencia= $connection->prepare($sql);

        if(!$sentencia){
            return null;
        }else{
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
            
        }
    }

    public function getCategoriaByName($nameTitulo){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "SELECT IdCategoria FROM categoria WHERE Titulo = :nameE";
        $sentencia= $connection->prepare($sql);
        $sentencia->bindParam(":nameE", $nameTitulo);

        if(!$sentencia){
            return null;
        }else{
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
            
        }
    }

    public function getCate(){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "SELECT * FROM categoria";
        $sentencia= $connection->prepare($sql);

        if(!$sentencia){
            return null;
        }else{
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
            
        }
    }

    public function insertCategory($titulo){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "INSERT INTO categoria (Titulo, Descripcion) VALUES (:titulo, '...')";
        $sentencia= $connection->prepare($sql);
        $sentencia->bindParam(":titulo", $titulo);
        if(!$sentencia){
            return false;
        }else{
            $sentencia->execute();
            return true;
        }
    }
    
    public function updateCategoria($titulo, $descripcion){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "UPDATE categoria SET Titulo=:titulo, Descripcion=:d WHERE idCategoria=:id";
        $sentencia= $connection->prepare($sql);
        $sentencia->bindParam(":titulo", $titulo);
        $sentencia->bindParam(":d", $descripcion);
        $sentencia->bindParam(":id", $id);
        if(!$sentencia){
            return false;
        }else{
            $sentencia->execute();
            return true;
        }
    }
}

?>