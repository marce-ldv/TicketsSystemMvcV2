<?php

namespace dao;

use model\Ticket as Ticket;
use interfaces\ICrud as ICrud;
use helpers\Collection as Collection;
use dao\Singleton as Singleton;
use PDOException;
use Exception;

class TicketDAO extends Singleton implements ICrud
{
    private $connection;
    
    public function __construct () {
    }
    
    /**
     * @param Ticket $_data
     * @return int
     */
    public function create (Ticket $_data) {
        try {
            
            $sql = "INSERT INTO tickets (id_line_purchase, code_qr) VALUES (:id_line_purchase, :code_qr)";
            
            $parameters['id_line_purchase'] = $_data->getLinePurchase()->getIdLinePurchases();
            $parameters['code_qr'] = $_data->getQr();
            
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
            
            $sql = "SELECT * FROM tickets where id_ticket_number = :id";
            
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
            
            $sql = "SELECT * FROM tickets";
            
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
     * @param Ticket $value
     * @return int
     */
    public function update (Ticket $value) {
        $sql = "UPDATE tickets SET id_line_purchase = :id_line_purchase, code_qr = :code_qr WHERE id_ticket_number = :id ";
        
        $parameters['id'] = $value->getIdTicketNumber();
        $parameters['id_line_purchase'] = $value->getLinePurchase()->getIdLinePurchases();
        $parameters['code_qr'] = $value->getQr();
        
        try {
            
            $this->connection = Connection::getInstance();
            return $this->connection->executeNonQuery($sql, $parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }
    
    /**
     * @param $id
     * @return int
     * @throws PDOException
     */
    public function delete ($id) {
        
        try {
            $sql = "DELETE FROM tickets WHERE id_ticket_number = :id";
            $parameters['id'] = $id;
            
            $this->connection = Connection::getInstance();
            return $this->connection->ExecuteNonQuery($sql, $parameters);
        } catch (PDOException $Exception) {
            
            throw $Exception;
            
        }
    }
    
    /**
     * @param $value
     * @return array
     */
    public function mapMethod ($value) {
        
        $value = is_array($value) ? $value : [$value];
        
        $resp = array_map(function ($p) {
            $linePurchase = LinePurchaseDAO::getInstance()->read($p['id_line_purchase']);
            return new Ticket(
                $p['id_ticket_number'],
                $p['code_qr'],
                $linePurchase
                );
        }, $value);
        
        return count($resp) > 1 ? $resp : $resp[0];
        
    }
}
