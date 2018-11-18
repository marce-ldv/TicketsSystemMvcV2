<?php

namespace dao;

use model\PlaceEvent as PlaceEvent;
use interfaces\ICrud as ICrud;
use helpers\Collection as Collection;

  class PlaceEventDAO implements ICrud
  {
    private $table = "place_events";
  	private $list = array();
  	private static $instance;
  	private $pdo;

  	public function __construct()
  	{
  		$this->pdo = new Connection();
  	}

    public function create(&$placeEvent)
    {
      try
      {
        $sql = "INSERT INTO $this->table (capacity, description) VALUES (:capacity, :description)";

        $connection = Connection::connect();
    		$statement = $connection->prepare($sql);

        $capacity = $placeEvent->getCapacity();
        $description = $placeEvent->getDescription();

        $statement->execute(array(
          ":capacity" => $capacity,
          ":description" => $description,
      ));

        return $connection->lastInsertId();

      }
      catch(\PDOException $e)
      {
        throw $e;
      }
      catch (\Exception $e)
      {
        throw $e;
      }
    }

  public function read($id)
  {
    try {

      $sql = "SELECT FROM $this->table WHERE id_place_event = $id"

      $connection = Connection::connect();
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
      $sql = "UPDATE $this->table SET capacity = :capacity AND description = :description WHERE id_place_event =:id ";

      $connection = Connection::connect();
  		$statement = $connection->prepare($sql);

      $capacity = $value->getCapacity();
      $description = $values->getDescription();

      $statement->execute(array(
        ":capacity" => $capacity,
        ":description" => $description,
      ));

      return $connection->lastInsertId();
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
  		$sql = "DELETE FROM $this->table WHERE id_place_event = :id "; // si es un string poner \" $id \";

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

    if($dataSet)
    {
      $collection = new Collection();

      foreach ($dataSet as $p) {
        $u = new PlaceEvent();
        $u->setCapacity($p["$capacity"])
        ->setDescription($p["$description"])
        ->setIdPlaceEvent($p["$id_place_event"]);

        $collection->add($u);
      }

      $this->list = $collection;
    }
  }
}
