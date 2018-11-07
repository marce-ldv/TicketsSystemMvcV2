<?php

namespace dao;

use model\category as Category;
use interfaces\ICrud as ICrud;
use helpers\Collection as Collection;

class CategoryDAO extends SingletonDAO implements ICrud
{
	private $table = "categories";
	private $list = array();
	private static $instance;
	private $pdo;

	public function __construct()
	{
		$this->pdo = new Connection();
	}

	// no lo necesito porque esta el singletonDAO
	/*public function getInstance()
	{
	if(!self::$instance instanceof self)
	{
	self::$instance = new self();
}
return self::$instance;
}*/


public function create(&$category)
{
	try
	{
		$sql = "INSERT INTO $this->table (description) VALUE (:description)"; //le agregue la S a VALUE

		$connection = Connection::connect(); // probar si funciona $connection = Connection::connect();
		$statement = $connection->prepare($sql);

		$description = $category->getDescriptionCategory();

		$statement->execute(array(
			":$description" => $description,
		));

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

/*TODO: PROBAR READ Y READALL EN LA CONTROLADORA*/

public function read($id)
{
	try {

		$sql = "SELECT * FROM $this->table WHERE $idCategory = $id";

		$pdo = new Connection(); // <- en vez de esta y
		$connection = $pdo->connect(); // esta linea se puede poner $connection = Connection::connect();
		$statement = $connection->prepare($sql);

		$statement->execute();

		$dataSet[] = $statement->fetch(\PDO::FETCH_ASSOC);

		// como siempre va a traer un solo objeto pongo dataSet[0] ya que estoy parado en el primer lugar
		if($dataSet[0])
		{
			$this->mapMethod($dataSet);
		}

		if(!empty($this->list[0]))
		{
			return $this->list[0];
		}

		return false;

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

		$this->mapMethod($dataSet);

		return $this->list;
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

public function update($value)
{
	try
	{
		$sql = "UPDATE this->table SET description = :description WHERE idCategory = :id ";

		$connection = Connection::connect();
		$statement = $connection->prepare($sql);

		$description = $value->getDescriptionCategory();
		$id = $value->getIdCategory();

		$statement->bindParam(":description",$description);
		$statement->binParam(":id",$id);

		$statement->execute();
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

public function delete($id)
{
	try
	{
		$sql = "DELETE FROM $this->table WHERE idCategory = $id "; // si es un string poner \" $id \";

		$connection = Connection::connect();
		$statement = $connection->prepare($sql);



		$statement->execute;
	}catch(\PDOException $e){}
	}

	public function mapMethod($dataSet)
	{
		$dataSet = is_array($dataSet) ? $dataSet : false;

		if($dataSet)
		{
			$collection = new Collection();

			foreach ($variable as $p) {
				$u = new Category();
				$u->getDescriptionCategory($p['description']) // esto no iria con comillas ?
				->setIdCategory($p['idCategory']);

				$collection->add($u);
			}

			$this->list = $collection;

	}
}

}
