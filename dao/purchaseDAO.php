<?php namespace dao;

use dao\{
    Singleton as Singleton
};
use model\Purchase;
use PDOException;
use Exception;

class PurchaseDAO extends Singleton
{
    private $connection;
    
    public function __construct () {
    }
    
    /**
     * @param Purchase $_data
     * @return int
     */
    public function create (Purchase $_data) {
        try {
            
            $sql = "INSERT INTO purchases (id_user, date_purchase) VALUES (:id_user, :date_purchase)";
            
            $parameters['id_user'] = $_data->getUser()->getIdUser();
            $parameters['date_purchase'] = date("Y/m/d");
            
            // creo la instancia connection
            $this->connection = Connection::getInstance();
            // Ejecuto la sentencia.
            return $this->connection->executeNonQuery($sql, $parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }
    
    /**
     * @param $id
     * @return array|bool
     * @throws Exception
     */
    public function read ($id) {
        try {
            
            $sql = "SELECT * FROM purchases where id_purchase = :id";
            
            $parameters['id'] = $id;
            
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
        
        
        if (!empty($resultSet))
            return $this->mapMethod($resultSet);
        else
            return false;
    }
    
    /**
     * @return array|bool
     * @throws Exception
     */
    public function readAll () {
        try {
            
            $sql = "SELECT * FROM purchases";
            
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql);
        } catch (Exception $ex) {
            throw $ex;
        }
        
        if (!empty($resultSet))
            return $this->mapMethod($resultSet);
        else
            return false;
    }
    
    /**
     * @param $value
     * @return array
     */
    public function mapMethod ($value) {
        
        $value = is_array($value) ? $value : [$value];
        
        $resp = array_map(function ($p) {
            
            $user = UserDAO::getInstance()->read($p['id_user']);
            
            return new Purchase(
                $p['id_purchase'],
                $user,
                $p['date_purchase']
            );
        }, $value);
        
        return count($resp) > 1 ? $resp : $resp[0];
        
    }
}//class end
