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
			$fieldSQL;
			$paramSQL;

			// bindParams
			foreach ($data as $key => $value) {
				$bindParams[":".$key] = $value;
			}

			$fieldSQL = "(";
			$paramSQL = "(";
			foreach ($fields as $value) {
				$fieldSQL .= $value.",";
				$paramSQL .= ":".$value.",";
			}
			$fieldSQL = rtrim($fieldSQL, ",");
			$paramSQL = rtrim($paramSQL, ",");
			$fieldSQL .= ")";
			$paramSQL .= ")";

      $sql = "INSERT INTO $this->table $fieldSQL VALUES $paramSQL";

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

	// "id_type_area" => 22
	public function read($data = [])
  {
    try {

			$bindParams = [];
			$idField = \array_key_first($data);
			$idValue = $data[$idField];

			// bindParams
			$bindParams[":".$idField] = $idValue;

      $sql = "SELECT * FROM $this->table WHERE $idField = $idValue";

      //$pdo = new Connection(); // <- en vez de esta y
      //$connection = $pdo->connect(); // esta linea se puede poner
      $connection = Connection::connect();
      $statement = $connection->prepare($sql);

      $statement->execute($bindParams);

      return $statement->fetch(\PDO::FETCH_ASSOC);

    }
    catch (\PDOException $e)
    {
      echo $e->getMessage();
      die();
    }
    catch (Exception $e)
    {
      echo $e->getMessage();
      die();
    }

  }

	public function readAll()
  {
    try
    {
      $sql = "SELECT * FROM $this->table";

      $connection = Connection::connect();
      $statement = $connection->prepare($sql);

      $statement->execute();

      $dataSet = $statement->fetchAll(\PDO::FETCH_ASSOC);

      return $dataSet;
    }
    catch(\PDOException $e)
    {
      echo $e->getMessage();
      die();
    }
    catch(Exception $e)
    {
      echo $e->getMessage();
      die();
    }
  }

	public function delete($data = [])
	{
		try
		{

			$bindParams = [];
			$idField = array_key_first($data);
			$idValue = $data[$idField];

			// bindParams
			$bindParams[":".$idField] = $idValue;

			$sql = "DELETE FROM $this->table WHERE $idField = $idValue "; // si es un string poner \" $id \";

			$connection = Connection::connect();
			$statement = $connection->prepare($sql);

			$statement->execute($bindParams);

		}catch(\PDOException $e)
		{
			echo $e->getMessage();
			die();
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
			die();
		}
	}

	public function update($data = [], $idData)
	{
		try
		{
			$fields = array_keys($data);
			$bindParams = [];

			//id Data
			$idField = array_key_first($idData);
			$idValue = $idData[$idField];

			// bindParams
			foreach ($data as $key => $value) {
				$bindParams[":".$key] = $value;
			}

			$fieldSQL = "";
			foreach ($fields as $value) {
				$fieldSQL .= "$value = :$value ,";
			}
			$fieldSQL = rtrim($fieldSQL, ",");


			$sql = "UPDATE $this->table SET $fieldSQL WHERE $idField = $idValue ";

			$connection = Connection::connect();
			$statement = $connection->prepare($sql);
			$statement->execute($bindParams);
		}
		catch(\PDOException $e)
		{
			echo $e->getMessage();
			die();
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
			die();
		}
	}


}
