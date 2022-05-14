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
        public function getEventByID($idEvento){
            $model = new Conection();
            $connection  = $model->_getConection();
            $sql = "SELECT * FROM evento WHERE IdEvento = :id";
            $sentencia= $connection->prepare($sql);
            $sentencia->bindParam(":id", $idEvento); 
            if(!$sentencia){
                return null;
            }else{
                $sentencia->execute();
                $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
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
            $statement->bindParam(":conf", $conf); 
            if(!$statement){
                return false; 
            }else{
                $statement->execute();
                return true; 
            }  
        }
        public function howManyUserinEvent($idEvento){
            $cn = new Conection();
            $db = $cn->_getConection(); 
            $sql = "SELECT COUNT(idUsuario) FROM detalle_usuarioevento WHERE idEvento = :idEvento"; 
            $statement = $db->prepare($sql);
            $statement->bindParam(":idEvento", $idEvento);  
            if(!$statement){
                return null; 
            }else{
                $statement->execute(); 
                return $statement->fetch(PDO::FETCH_ASSOC); 
            }
        }
        public function verifyUsario($user,$pass){
            $connection = new Conection(); 
            $db = $connection->_getConection(); 
            $encryptPass=md5($pass);
            $sql="SELECT Username,Password FROM usuario WHERE Username=:Username AND Password=:Password";
            $statement=$db->prepare($sql);
            $statement->bindParam(":Username",$user);
            $statement->bindParam(":Password",$encryptPass);
            $statement->execute();
            $contador= $statement->rowCount();
            if ($contador>0) {
                return true;
            }else {
                return false;
            }
        }
        public function getRol($username,$pass)
    {
        $connection = new Conection(); 
        $db = $connection->_getConection(); 
        $encryptPass=md5($pass);
        $sql="SELECT Username,Password FROM usuario WHERE Username=:Username AND Password=:Password";
        $statement=$db->prepare($sql);
        $statement->bindParam(":Username",$user);
        $statement->bindParam(":Password",$encryptPass);
        $statement->execute(); 
        $resultado=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
    public function getUser($username,$pass){
        $model = new Conection();
        $connection  = $model->_getConection();
        $encryptPass=md5($pass);
        $sql = "SELECT Rolusuario, idUsuario FROM usuario WHERE Username=:Username AND Password=:Password";
        $sentencia= $connection->prepare($sql);
        $sentencia->bindParam(":Username",$username);
        $sentencia->bindParam(":Password",$encryptPass);
        if(!$sentencia){
            return null;
        }else{
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $resultado;
            
        }
    }
    public function getUserStatusEvent($user, $event){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "SELECT Confirmacion FROM detalle_usuarioevento WHERE idEvento = :evento AND idUsuario = :usuario";
        $sentencia= $connection->prepare($sql);
        $sentencia->bindParam(":usuario",$user);
        $sentencia->bindParam(":evento",$event);
        if(!$sentencia){
            return null;
        }else{
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            if($resultado!=null){
                return $resultado['Confirmacion']; 
            }else{
                return ["no hay nada"]; 
            }
          
        }
    }
    public function deleteEventAndUserC($user, $event){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "DELETE FROM  detalle_usuarioevento WHERE idEvento = :evento AND idUsuario = :usuario";
        $sentencia= $connection->prepare($sql);
        $sentencia->bindParam(":usuario",$user);
        $sentencia->bindParam(":evento",$event);
        if(!$sentencia){
            return false;
        }else{
            $sentencia->execute();
            return true;             
        }
    }
    public function UpdateEventAndUserC($user, $event){
        $model = new Conection();
        $connection  = $model->_getConection();

        $sql = "UPDATE FROM  detalle_usuarioevento SET Confirmacion = :conf WHERE idEvento = :evento AND idUsuario = :usuario";
        $sentencia= $connection->prepare($sql);
        $sentencia->bindParam(":usuario",$user);
        $sentencia->bindParam(":evento",$event);
        $sentencia->bindParam(":conf", "Confirmado"); 
        if(!$sentencia){
            return false;
        }else{
            $sentencia->execute();
            return true;             
        }
    }
    }


?>