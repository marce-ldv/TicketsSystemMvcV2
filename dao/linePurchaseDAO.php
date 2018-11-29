<?php
    
    namespace dao;
    
    use dao\Singleton as Singleton;
    use model\LinePurchase as LinePurchase;
    use PDOException;
    use Exception;
    
    class LinePurchaseDAO extends Singleton
    {
        private $connection;
        
        public function __construct () {
        }
        
        /**
         * @param LinePurchase $_data
         * @return int
         */
        public function create (LinePurchase $_data) {
            try {
                
                $sql = "INSERT INTO lines_purchases (id_purchase, id_event_area, quantity, price) VALUES (:id_purchase, :id_event_area, :quantity, :price)";
                
                $parameters['id_purchase'] = $_data->getPurchases()->getIdPurchase();
                $parameters['id_event_area'] = $_data->getEventArea()->getIdEventArea();
                $parameters['quantity'] = $_data->getQuantity();
                $parameters['price'] = $_data->getPrice();
                
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
                
                $sql = "SELECT * FROM lines_purchases where id_line_purchase = :id";
                
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
                
                $sql = "SELECT * FROM lines_purchases";
                
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
         * @return int
         */
        public function update (LinePurchase $value) {
            $sql = "UPDATE lines_purchases SET id_purchase = :id_purchase, id_event_area = :id_event_area, quantity = :quantity, price = :price WHERE id_line_purchase = :id ";
            
            $parameters['id'] = $value->getIdLinePurchases();
            $parameters['id_purchase'] = $value->getPurchases()->getIdPurchase();
            $parameters['id_event_area'] = $value->getEventArea()->getIdEventArea();
            $parameters['price'] = $value->getPrice();
            $parameters['quantity'] = $value->getQuantity();
            
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
                $sql = "DELETE FROM lines_purchases WHERE id_line_purchase = :id";
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
                $purchase = PurchaseDAO::getInstance()->read($p['id_purchase']);
                $eventArea = EventAreaDAO::getInstance()->read($p['id_event_area']);
                
                return new LinePurchase(
                    $p['id_line_purchase'],
                    $eventArea,
                    $purchase,
                    $p['quantity'],
                    $p['price']);
            }, $value);
            
            return count($resp) > 1 ? $resp : $resp[0];
            
        }
    }
