<?php
class Database {
   private static $dbName = 'b1k1eq92tfle9dvefsn9' ;
   private static $dbHost = 'b1k1eq92tfle9dvefsn9-mysql.services.clever-cloud.com:3306' ;
   private static $dbUsername = 'ur0llambwrybi3we';
   private static $dbUserPassword = 'oUf6NbAmrwwBC6hCawRu';     
   private static $cont  = null;
     
    //Constructor de la clase
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect() {
       //Una sola conexión para toda la aplicación
       if (null == self::$cont) {     
          try {
             self::$cont =  new PDO("mysql:host=".self::$dbHost.";"."dbname=".self::$dbName.";charset=utf8", self::$dbUsername, self::$dbUserPassword);
          } catch(PDOException $e) {
             die($e->getMessage());
          }
       }
       return self::$cont;
    }
     
    public static function disconnect() {
        self::$cont = null;
    }
}
?>
