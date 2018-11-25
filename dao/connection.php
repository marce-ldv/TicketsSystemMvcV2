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

        public function execute($query, $parameters = array())
     {
          try
          {
			// Creo una sentencia llamando a prepare. Esto devuelve un objeto statement
               $this->pdoStatement = $this->pdo->prepare($query);

               foreach($parameters as $parameterName => $value)
               {
                    // Reemplazo los marcadores de parametro por los valores reales utilizando el método bindParam().
                    $this->pdoStatement->bindParam(":".$parameterName, $value);
               }

               $this->pdoStatement->execute();

               return $this->pdoStatement->fetchAll();
          }
          catch(Exception $ex)
          {
               throw $ex;
          }
     }

     /**
      *
      */
     public function executeNonQuery($query, $parameters = array())
     {
          try
          {
               // Creo una sentencia llamando a prepare. Esto devuelve un objeto statement
               $this->pdoStatement = $this->pdo->prepare($query);

               foreach($parameters as $parameterName => $value) {
                    // Reemplazo los marcadores de parametro por los valores reales utilizando el método bindParam().
                    $this->pdoStatement->bindParam(":$parameterName", $parameters[$parameterName]);
               }

               $this->pdoStatement->execute();

               return $this->pdoStatement->rowCount();
          }
          catch(\PDOException $ex)
          {
               throw $ex;
          }
     }


    }
?>
