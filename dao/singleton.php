<?php

namespace dao;

class Singleton{

	protected $table;
	private static $instance = array();

	static function getInstance(){
		$class = get_called_class();

		if(!isset(self::$instance[$class])){
			self::$instance[$class] = new $class;
		}

		return self::$instance[$class];
	}

	public function create ($data = []) {
		try
    {
			$fields = array_keys($data);
			$bindParams = [];
			$values = array_values($data);

			// bindParams
			foreach ($data as $key => $value) {
				$bindParams[":".$key] = $value;
			}

			$fieldSQL = "(";
			foreach ($fields as $value) {
				$fieldSQL .= $value.",";
			}
			$fieldSQL = rtrim($fieldSQL, ",");
			$fieldSQL .= ")";

			$valuesSQL = "(";
			foreach ($values as $value) {
				$valuesSQL .= "'".$value."',";
			}
			$valuesSQL = rtrim($valuesSQL, ",");
			$valuesSQL .= ")";

      $sql = "INSERT INTO $this->table $fieldSQL VALUES $valuesSQL";

      $connection = Connection::connect();
      $statement = $connection->prepare($sql);

      $statement->execute($bindParams);

      return $connection->lastInsertId();
    }
    catch(\PDOException $e)
    {
      throw $e;
    }
    catch(Exception $e)
    {
      throw $e;
    }
	}


}
