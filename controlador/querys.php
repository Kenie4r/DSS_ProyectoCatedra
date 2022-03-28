<?php

    class Query{

        public function get3RecentEventos(){
            $model = new Conection();
            $connection  = $model->_getConection();
            $sql = "SELECT * FROM evento ORDER BY idEvento DESC LIMIT 3";
            $sentencia= $connection->prepare($sql);
            if(!$sentencia){
                return null;
            }else{
                $sentencia->execute();
                $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
                
            }
        }

        public function get3Categories(){
            $model = new Conection();
            $connection  = $model->_getConection();
            $sql = "SELECT * FROM categoria ORDER BY idCategoria DESC LIMIT 3";
            $sentencia= $connection->prepare($sql);
            if(!$sentencia){
                return null;
            }else{
                $sentencia->execute();
                $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
                
            }
        }
        public function InsertEventUserC($user, $evento, $conf){
            //query para poder aceptar si se va a ir 
            $connection = new Conection(); 
            $db = $connection->_getConection(); 
            $sql = "INSERT INTO detalle_usuarioevento(idUsuario, idEvento, Confirmacion) VALUES(:IdUsuario, :idEvento, :conf) "; 
            $statement = $db->prepare($sql); 
            $statement->bindParam(":IdUsuario", $user); 
            $statement->bindParam(":idEvento", $evento); 
            $statement->bindParam(":conf", "En espera"); 
            if(!$statement){
                return null; 
            }else{
                $statement->execute();
                return "Se inserto " . $statement->RowCount() . " filas"; 
            }  
        }
    }



?>