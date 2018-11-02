<?php namespace dao;

    class Connection {

        public function __construct(){}

        public static function connect() {
            try{
                return new \PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER, DB_PASS);
            }catch(PDOException $e){
                echo 'Error '. $e->getMessage();
                die();
            }
        }
    }
?>
