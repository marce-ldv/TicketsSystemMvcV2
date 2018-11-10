<?php

namespace dao;

use model\Event as Event;
use interfaces\ICrud as ICrud;
use dao\SingletonDAO as SingletonDAO;
use helpers\Collection as Collection;
use dao\CategoryDAO as CategoryDAO;

class EventDAO extends SingletonDAO implements ICrud
{
	private $table = "events";
	private $list;
	private static $instance;
	private $pdo;

	public function __construct()
	{
		$this->pdo = new Connection();
		$this->list = new Collection();
	}


	public function create(&$value)
	{
		try
		{
			$sql = "INSERT INTO $this->table (category, title)  VALUES (:category, :title)";

			$connection = Connection::connect(); // crea la coneccion a la bbdd
			$statement = $connection->prepare($sql);

			$category = $value->getCategoryEvent();
			$title = $value->getTitleEvent();

/*			$statement->bindParam(":category" , $category);
			$statement->bindParam(":title" , $title);*/

			$statement->execute(array(
				":category" => $category,
				":title" => $title,
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

			$sql = "SELECT * FROM $this->table WHERE id_event = $id";

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

	//TODO: Hacer que devuelva un collection vacio
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
			$sql = "UPDATE $this->table SET category = :category AND title = :title WHERE id_artist = :id ";

			$connection = Connection::connect();
			$statement = $connection->prepare($sql);

			$category = $value->getCategoryEvent();
			$title = $value->getTitleEvent();
			$id = $value->getIdEvent();

			$statement->bindParam(":category",$category);
			$statement->bindParam(":title",$title);
			$statement->bindParam(":id",$id);

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
			$sql = "DELETE FROM $this->table WHERE id_event = :id "; // si es un string poner \" $id \";

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


	// dataSet: conjunto de datos
	public function mapMethod($dataSet)
	{
		$dataSet = is_array($dataSet) ? $dataSet : false;

		if($dataSet)
		{
			$collection = new Collection();

			foreach ($variable as $p) {
				$u = new Event();

				$categoryDAO = new CategoryDAO();
				$category = $categoryDAO->read($p["id_category"]);

				$u->setIdEvent($p["id_event"])
				->setCategory($category)
				->setTitleEvent($p["title"])
				->setIdArtist($p['id_artist']);

				$collection->add($u);
			}

			$this->list = $collection;
		}

	}
}
