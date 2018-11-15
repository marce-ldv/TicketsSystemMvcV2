<?php

namespace dao;

use model\Category as Category;
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
		$sql = "INSERT INTO $this->table (name_category) VALUE (:nameCategory)";

		$connection = Connection::connect();
		$statement = $connection->prepare($sql);

		$nameCategory = $category->getNameCategory();

		$statement->execute(array(
			":nameCategory" => $nameCategory,
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
		$sql = "UPDATE this->table SET name_category = :nameCategory WHERE idCategory = :id ";

		$connection = Connection::connect();
		$statement = $connection->prepare($sql);

		$nameCategory = $value->getNameCategory();
		$id = $value->getIdCategory();

		$statement->execute(array(
			":nameCategory" => $nameCategory,
			":id" => $id,
		));

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

		$statement->execute(array(
			":id" => $id,
		));

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

	public function mapMethod($dataSet)
	{
		$dataSet = is_array($dataSet) ? $dataSet : false;

		if( is_array($dataSet) )
		{
			$collection = new Collection();

			foreach ($dataSet as $p) {
				$u = new Category();
				$u->setNameCategory($p['name_category'])
				->setIdCategory($p['id_category']);

				$collection->add($u);
			}

			$this->list = $collection;

	} else {
		$u = new Category();
		$u->setNameCategory($dataSet['name_category'])
		->setIdCategory($dataSet['id_category']);
	}
}

}
