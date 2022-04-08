<?php
class Database {
    private static $dbName = 'agendaproyectocatedra' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';     
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
