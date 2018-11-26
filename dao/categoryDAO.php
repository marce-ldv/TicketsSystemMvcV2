<?php
    
    namespace dao;
    
    use model\Category as Category;
    use dao\Singleton as Singleton;
    use PDOException;
    use Exception;
    
    class CategoryDAO extends Singleton
    {
        private $connection;
        
        public function __construct () {
        }
    
        /**
         * @param $_data
         * @return int
         */
        public function create (Category $_data) {
            try {
                
                $sql = "INSERT INTO categories (name_category) VALUES (:nameCategory)";
                
                $parameters['nameCategory'] = $_data->getNameCategory();
                
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
                
                $sql = "SELECT * FROM categories where id_category = :id";
                
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
                
                $sql = "SELECT * FROM categories";
                
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
         * @param $value Category
         * @return int
         */
        public function update (Category $value) {
            $sql = "UPDATE categories SET name_category = :name_category WHERE id_category = :id ";
            
            $parameters['id'] = $value->getIdCategory();
            $parameters['name_category'] = $value->getNameCategory();
            
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
                $sql = "DELETE FROM categories WHERE id_category = :id";
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
                return new Category($p['id_category'], $p['name_category']);
            }, $value);
            
            return count($resp) > 1 ? $resp : $resp[0];
            
        }
    }
