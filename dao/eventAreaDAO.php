<?php
    
    namespace dao;
    
    //PHP 7 Group use
    //https://wiki.php.net/rfc/group_use_declarations
    use dao\{
        Connection as Connection,
        TypeAreaDAO as TypeAreaDAO,
        CalendarDAO as CalendarDAO,
        Singleton as Singleton
    };
    use model\{
        EventArea as EventArea
    };
    use PDOException;
    use Exception;

    /**
     * Class EventAreaDAO
     * @package dao
     */
    class EventAreaDAO extends Singleton
    {
        private $connection;
    
        /**
         * EventAreaDAO constructor.
         */
        public function __construct () {
        }
        
        /**
         * @param EventArea $_data
         * @return int
         * @throws
         */
        public function create (EventArea $_data) {
            try {
                
                $sql = "INSERT INTO events_area (id_type_area, id_calendar, quantity_avaliable, price, remainder) VALUES (:idTypeArea, :idCalendar, :quantity, :price, :remainder)";
                
                $parameters['idTypeArea'] = $_data->getTypeArea()->getIdTypeArea();
                $parameters['idCalendar'] = $_data->getCalendar()->getIdCalendar();
                $parameters['quantity'] = $_data->getQuantityAvaliable();
                $parameters['price'] = $_data->getPrice();
                $parameters['remainder'] = $_data->getRemainder();
                
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
         * @return EventArea[]|bool
         * @throws Exception
         */
        public function read ($id) {
            try {
                
                $sql = "SELECT * FROM events_area where id_event_area = :id";
                
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
                
                $sql = "SELECT * FROM events_area";
                
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
        public function update (EventArea $value) {
            $sql = "UPDATE events_area SET id_type_area = :idTypeArea, id_calendar = :idCalendar, quantity_avaliable = :quantity, price = :price, remainder = :remainder WHERE id_event_area = :id ";
            
            $parameters['id'] = $value->getIdEventArea();
            $parameters['idTypeArea'] = $value->getTypeArea()->getIdTypeArea();
            $parameters['idCalendar'] = $value->getCalendar()->getIdCalendar();
            $parameters['quantity'] = $value->getQuantityAvaliable();
            $parameters['price'] = $value->getPrice();
            $parameters['remainder'] = $value->getRemainder();
            
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
                $sql = "DELETE FROM events_area WHERE id_event_area = :id";
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
        /**
         * @param $value
         * @return array
         */
        public function mapMethod ($value) {
        
            $value = is_array($value) ? $value : [$value];
        
            $resp = array_map(function ($p) {
                $calendarDAO = CalendarDAO::getInstance();
                $typeAreaDAO = TypeAreaDAO::getInstance();
                
                $calendar = $calendarDAO->read($p['id_calendar']);
                $typArea = $typeAreaDAO->read($p['id_type_area']);
                return new EventArea(
                    $p['id_event_area'],
                    $typArea,
                    $calendar,
                    $p['quantity_avaliable'],
                    $p['price'],
                    $p['remainder']
                );
            }, $value);
        
            return count($resp) > 1 ? $resp : $resp[0];
        
        }
        
    }
