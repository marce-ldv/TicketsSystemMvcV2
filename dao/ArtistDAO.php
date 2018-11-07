<?php

namespace dao;

use model\Artist as Artist;
use interfaces\ICrud as ICrud;
use helpers\Collection as Collection;

class ArtistDAO extends SingletonDAO implements ICrud
{
	private $table = "artists";
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


public function create(&$artist)
{
	try
	{
		$sql = "INSERT INTO $this->table (nickname, name, surname) VALUES (:nickname, :name, :surname)"; //le agregue la S a VALUE

		$connection = Connection::connect(); // probar si funciona $connection = Connection::connect();
		$statement = $connection->prepare($sql);

		$name = $artist->getNameArtist();
		$nickname = $artist->getNickname();
		$surname = $artist->getSurname();

		$statement->execute(array(
			":nickname" => $nickname,
			":name" => $name,
			":surname" => $surname
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

		$sql = "SELECT * FROM $this->table WHERE artists_id = $id";

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
		$sql = "UPDATE $this->table SET name = :name WHERE id_artist = :id "; // le agregue el $ a this->table

		$connection = Connection::connect();
		$statement = $connection->prepare($sql);

		$name = $value->getNameArtist();
		$id = $value->getIdArtist();

		$statement->bindParam(":name",$name);
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
		$sql = "DELETE FROM $this->table WHERE id_artist = $id "; // si es un string poner \" $id \";

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
				$u = new Artist();
				$u->setName($p[name]) // esto no iria con comillas ?
				->setNickname($p["nickname"])
				->setSurname($p["surname"])
				->setIdArtist($p['id_artist']);

				$collection->add($u);
			}

			$this->list = $collection;
			
	}
}

}
