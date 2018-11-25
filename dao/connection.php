<?php namespace dao;

    class Connection {

        public function __construct(){}

        public static function connect() {
            /*con array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION) habilitas al PDO que notifique siempre que ocurra una excepcion en las consultas SQL*/
            try{
                return new \PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER, DB_PASS, array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
            }catch(PDOException $e){
                echo 'Error '. $e->getMessage();
                die();
            }
        }

        
    }
?>
