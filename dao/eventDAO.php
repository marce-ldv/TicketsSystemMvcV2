<?php
    
    namespace dao;
    
    use Exception;
    use PDOException;
    use model\Event as Event;
    use model\Category as Category;
    use dao\Singleton as Singleton;
    use dao\CategoryDAO as CategoryDAO;
    
    class EventDAO extends Singleton
    {
        private $connection;
        
        public function __construct () {
        }
        
        /**
         * @param Event $_data
         * @return int
         */
        public function create (Event $_data) {
            try {
                $sql = "INSERT INTO events (id_category, title) VALUES (:idCategory, :title)";
                
                $category = new Category($_data->getCategory());
                
                $parameters['idCategory'] = $category->getIdCategory();
                $parameters['title'] = $_data->getTitleEvent();
                
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
                
                $sql = "SELECT * FROM events where id_event = :id";
                
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
                
                $sql = "SELECT * FROM events";
                
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
        public function update (Event $value) {
            $sql = "UPDATE events SET id_category = :idCategory, title = :title WHERE id_event = :id ";
            
            $category = new Category($value->getCategory());
            
            $parameters['id'] = $value->getIdEvent();
            $parameters['idCategory'] = $category->getIdCategory();
            $parameters['title'] = $value->getTitleEvent();
            
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
         * @throws
         */
        public function delete ($id) {
            
            try {
                $sql = "DELETE FROM events WHERE id_event = :id";
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
            
            //$category = new Category($_data->getCategory());
            //$category = $value->getCategory();
            //$idCategory = $category->getIdCategory();
            
            $resp = array_map(function ($p) {
                $dao = CategoryDAO::getInstance();
                $category = $dao->read($p['id_category']);
                return new Event($p['id_event'], $category, $p['title']);
            }, $value);
            
            return count($resp) > 1 ? $resp : $resp[0];
            
        }
    }
