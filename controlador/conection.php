<?php

class Conection{

    public function _getConection(){

        //SERVIDOR ONLINE
        //$user = "ur0llambwrybi3we";
        //$pass = "oUf6NbAmrwwBC6hCawRu";
        //$host = "b1k1eq92tfle9dvefsn9-mysql.services.clever-cloud.com:3306";
        //$db = "b1k1eq92tfle9dvefsn9";

        //SERVIDOR LOCALHOST
        $user = "root";
        $pass = "";
        $host = "localhost";
        $db = "agendaproyectocatedra";
        
        try{
            $conectar = new PDO("mysql:host=$host;dbname=$db",$user,$pass);
            //echo "Conexion lograda"; 
        }catch(PDOException $e){
            //echo $e->getMessage(); 
        }
        
        
        return $conectar;
    }
}

?>