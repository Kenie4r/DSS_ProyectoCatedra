<?php
require_once("conection.php");
class QueryRegister{
    public function InsertUser($username,$pass,$nombre,$apellido,$genero){
        $model = new Conection();
        $connection  = $model->_getConection();
        $encryptPass=md5($pass);
            $sql = "INSERT INTO usuario(Username,Password,Nombre,Apellido,Genero,Rolusuario) VALUES(:Username,:Password,:Nombre,:Apellido,:Genero,2) "; 
            $statement = $connection->prepare($sql); 
            $statement->bindParam(":Username", $username); 
            $statement->bindParam(":Password", $encryptPass ); 
            $statement->bindParam(":Nombre", $nombre); 
            $statement->bindParam(":Apellido", $apellido); 
            $statement->bindParam(":Genero", $genero); 
            $statement->execute();

    }
    
}
?>