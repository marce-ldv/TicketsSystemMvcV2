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





















}
