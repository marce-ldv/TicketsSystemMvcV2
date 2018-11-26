<?php
    
    namespace dao;
    
    /* type_areas(tipo plazas)  */
    
    use model\TypeArea as TypeArea;
    use dao\Singleton as Singleton;
    use Exception;
    use PDOException;
    
    class TypeAreaDAO extends Singleton
    {
        private $connection;
        
        public function __construct () {
        }
        
        /**
         * @param TypeArea $_data
         * @return int
         */
        public function create (TypeArea $_data) {
            try {
                
                $sql = "INSERT INTO type_areas (`_description`) VALUES (:description)";
                
                $parameters['description'] = $_data->getDescriptionTypeArea();
                
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
                
                $sql = "SELECT * FROM type_areas where id_type_area = :id";
                
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
                
                $sql = "SELECT * FROM type_areas";
                
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
        public function update (TypeArea $value) {
            $sql = "UPDATE type_areas SET `_description` = :description WHERE id_type_area = :id ";
            
            $parameters['id'] = $value->getIdTypeArea();
            $parameters['description'] = $value->getDescriptionTypeArea();
            
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
                $sql = "DELETE FROM type_areas WHERE id_type_area = :id";
                
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
                return new TypeArea($p['id_type_area'], $p['_description']);
            }, $value);
            
            return count($resp) > 1 ? $resp : $resp[0];
            
        }
    }
