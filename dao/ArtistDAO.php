<?php

namespace dao;

use model\Artist as Artist;
use interfaces\ICrud as ICrud;
use helpers\Collection as Collection;
use dao\Singleton as Singleton;

class ArtistDAO extends Singleton implements ICrud
{
	private $table = "artists";
	private $list = array();
	private static $instance;
	private $pdo;

	public function __construct()
	{
		$this->pdo = new Connection();
	}

	public function create(&$artist)
	{
		try
		{
			$sql = "INSERT INTO $this->table (nickname, name_artist, surname) VALUES (:nickname, :name_artist, :surname)"; //le agregue la S a VALUE

			$connection = Connection::connect(); // probar si funciona $connection = Connection::connect();
			$statement = $connection->prepare($sql);

			$nickname = $artist->getNickname();
			$name = $artist->getNameArtist();
			$surname = $artist->getSurname();

			$statement->execute(array(
				":nickname" => $nickname,
				":name_artist" => $name,
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

			$sql = "SELECT * FROM $this->table WHERE id_artist = $id";

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
		//print_r($value);
		try
		{
			$sql = "UPDATE $this->table SET nickname = :nickname,name_artist = :name_artist,surname = :surname WHERE id_artist = :id "; // le agregue el $ a this->table

			$connection = Connection::connect();
			$statement = $connection->prepare($sql);

			$nickname = $value->getNickname();
			$name = $value->getNameArtist();
			$surname = $value->getSurname();
			$id = $value->getIdArtist();

			$statement->bindParam(":nickname",$nickname);
			$statement->bindParam(":name_artist",$name);
			$statement->bindParam(":surname",$surname);
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
			$sql = "DELETE FROM $this->table WHERE id_artist = $id "; // si es un string poner \" $id \";

			$connection = Connection::connect();
			$statement = $connection->prepare($sql);

			$statement->execute();

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
			if (is_array($dataSet)) {
				$collection = new Collection();
				foreach ($dataSet as $p) {
					$u = new Artist(
						$p['id_artist'],
						$p["nickname"],
						$p["name_artist"],
						$p["surname"]
					);
					$collection->add($u);
				}
					$this->list = $collection;
			} elseif ($dataSet) {
				$u = new Artist(
					$dataSet['id_artist'],
					$dataSet["nickname"],
					$dataSet["name_artist"],
					$dataSet["surname"]
				);
				$this->list = [$u];
			}
		}

}
