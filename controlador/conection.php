<?php

class Conection{

    public function _getConection(){

        //SERVIDOR ONLINE
        //$user = "ur0llambwrybi3we";
        //$pass = "oUf6NbAmrwwBC6hCawRu";
        //$host = "b1k1eq92tfle9dvefsn9-mysql.services.clever-cloud.com:3306";
        //$db = "b1k1eq92tfle9dvefsn9";

        //SERVIDOR PLANET SCALE
        //$db = "agendaproyectocatedra";
        //$user = "0dfo0joap9w8";
        //$host = "rm8q1kzoea7k.us-east-1.psdb.cloud";
        //$pass = "pscale_pw_fhb0Rm6vIkHid_IVUys-OIkoYPQ2YhtwRG8omJOsh9w";
        //Opciones ssl
        //$options = array(
        //    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        //    PDO::MYSQL_ATTR_SSL_CA => '/path/to/cacert.pem',
        //    PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
        //);

        //SERVIDOR LOCALHOST
        $user = "root";
        $pass = "";
        $host = "localhost";
        $db = "agendaproyectocatedra";
        
        try{
            $conectar = new PDO("mysql:host=$host;dbname=$db",$user,$pass);
            //echo "Conexion lograda"; 
        }catch(PDOException $e){
            echo $e->getMessage(); 
        }
        
        
        return $conectar;
    }
}

?>