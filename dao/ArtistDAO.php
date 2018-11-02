<?php

namespace dao;

use model\Artist as Artist;
use interfaces\ICrud as ICrud;

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


	public function create($value)
	{
		try
		{
			$sql = "INSERT INTO $this->table (name) VALUE (:name)";

			$connection = Connection::connect(); // probar si funciona $connection = Connection::connect();
			$statement = $connection->prepare($sql);
			$name = $value->getNameArtist();

			$statement->bindParam(":name" , $name);

			$statement->execute();

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

			if(!empty($this->list))
			{
				return $this->list;
			}

			return null;
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
    		$sql = "UPDATE this->table SET name = :name WHERE id_artist = :id ";

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
			$this->list = array_map(function ($p)
			{
				$u = new Artist($p['name']);
				$u->setIdArtist($p['id_artist']);

				return $u;
			
			}, $dataSet); // cierre del array_map
		}
	}

}












