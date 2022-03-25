<?php

class Conection{

    public function _getConection(){

        $user = "root";
        $pass = "";
        $host = "localhost";
        $db = "agendacatedraproyecto";

        $conectar = new PDO("mysql:host=$host;dbname=$db",$user,$pass);
        
        return $conectar;
    }
}

?>