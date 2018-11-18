<?php

namespace dao;

use model\Category as Category;
use interfaces\ICrud as ICrud;
use helpers\Collection as Collection;
use dao\Singleton as Singleton;

class CategoryDAO extends Singleton implements ICrud
{
	private $list = array();
	private static $instance;
	private $pdo;

	public function __construct()
	{
		$this->table = "categories";
		$this->pdo = new Connection();
	}

	/*
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


public function read($id)
{
try {

$sql = "SELECT * FROM $this->table WHERE id_category = $id";

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
$sql = "UPDATE $this->table SET name_category = :nameCategory WHERE id_category = :id ";

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
$sql = "DELETE FROM $this->table WHERE id_category = $id "; // si es un string poner \" $id \";

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

*/

public function mapMethodCollection($dataSet)
{
	$collection = new Collection();
	foreach ($dataSet as $p) {
		$u = new Category(
			$p['id_category'],
			$p["name_category"]
		);
		$collection->add($u);
	}
	return $collection;
}

public function mapMethod ($dataSet) {
	$u = new Category(
		$dataSet['id_category'],
		$dataSet["name_category"]
	);
	return $u;
}

}
