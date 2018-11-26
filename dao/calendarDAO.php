<?php
    
    namespace dao;
    
    use model\Calendar as Calendar;
    use dao\Singleton as Singleton;
    use dao\EventDAO as EventDAO;
    use dao\PlaceEventDAO as PlaceEventDAO;
    use PDOException;
    use Exception;
    
    class CalendarDAO extends Singleton
    {
    
        private $connection;
    
        public function __construct () {
        }
    
        /**
         * @param Calendar $_data
         * @return int
         */
        public function create (Calendar $_data) {
            try {
            
                $sql = "INSERT INTO calendars (id_event, id_place_event, date_start, date_end) VALUES (:idEvent, :idPlaceEvent, :dateStart, :dateEnd)";
            
                $parameters['idEvent'] = $_data->getEvent()->getIdEvent();
                $parameters['idPlaceEvent'] = $_data->getPlaceEvent()->getIdPlaceEvent();
                $parameters['dateStart'] = $_data->getDateStart();
                $parameters['dateEnd'] = $_data->getDateEnd();
            
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
            
                $sql = "SELECT * FROM calendars where id_calendar = :id";
            
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
            
                $sql = "SELECT * FROM calendars";
            
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
         * @param $value Calendar
         * @return int
         */
        public function update (Calendar $value) {
            $sql = "UPDATE calendars SET id_event = :id_event, id_place_event = :id_place_event, date_start = :date_start, date_end = :date_end WHERE id_calendar = :id ";
        
            $parameters['id'] = $value->getIdCalendar();
            $parameters['id_event'] = $value->getEvent()->getIdEvent();
            $parameters['id_place_event'] = $value->getPlaceEvent()->getIdPlaceEvent();
            $parameters['date_start'] = $value->getDateStart();
            $parameters['date_end'] = $value->getDateEnd();
            
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
                $sql = "DELETE FROM calendars WHERE id_calendar = :id";
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
                $eventDAO = EventDAO::getInstance();
                $placeEventDAO = PlaceEventDAO::getInstance();
                
                $event = $eventDAO->read($p['id_event']);
                $placeEvent = $placeEventDAO->read($p['id_place_event']);
                
                return new Calendar($p['id_calendar'], $event, $placeEvent, $p['date_start'], $p['date_end']);
            }, $value);
        
            return count($resp) > 1 ? $resp : $resp[0];
        
        }
    }
