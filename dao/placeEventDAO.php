<?php
    
    namespace dao;
    
    use model\PlaceEvent as PlaceEvent;
    use dao\Singleton as Singleton;
    use PDOException;
    use Exception;

    /**
     * Class PlaceEventDAO
     * @package dao
     */
    class PlaceEventDAO extends Singleton
    {
        private $connection;
        
        public function __construct () {
        }
    
        /**
         * @param PlaceEvent $_data
         * @return int
         */
        public function create (PlaceEvent $_data) {
            try {
                
                $sql = "INSERT INTO place_events (capacity,_description) VALUES (:capacity,:_description)";
                
                $parameters['capacity'] = $_data->getCapacity();
                $parameters['_description'] = $_data->getDescription();
                
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
                
                $sql = "SELECT * FROM place_events where id_place_event = :id";
                
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
                
                $sql = "SELECT * FROM place_events";
                
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
        public function update (PlaceEvent $value) {
            $sql = "UPDATE place_events SET capacity = :capacity,_description = :_description WHERE id_place_event = :id ";
            
            $parameters['id'] = $value->getIdPlaceEvent();
            $parameters['capacity'] = $value->getCapacity();
            $parameters['_description'] = $value->getDescription();
            
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
         */
        public function delete ($id) {
            
            try {
                $sql = "DELETE FROM place_events WHERE id_place_event = :id";
                $parameters['id'] = $id;
                
                $this->connection = Connection::getInstance();
                return $this->connection->executeNonQuery($sql, $parameters);
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
                return new PlaceEvent(
                    $p['id_place_event'],
                    $p['capacity'],
                    $p['_description']
                );
            }, $value);
            
            return count($resp) > 1 ? $resp : $resp[0];
            
        }
    }
