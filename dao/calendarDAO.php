<?php

namespace dao;

use model\Calendar as Calendar;
use model\Event as Event;
use model\PlaceEvent as PlaceEvent;
use interfaces\ICrud as ICrud;
use helpers\Collection as Collection;

class CalendarDAO extends SingletonDAO implements ICrud
{
  private $table = "calendars";
	private $list = array();
	private static $instance;
	private $pdo;

	public function __construct()
	{
		$this->pdo = new Connection();
	}

  public function create(&$calendar)
  {
    try
    {
      $sql = "INSERT INTO $this->table (id_event, id_place_event, date_start, date_end) VALUES (:event, :placeEvent, :dateStart, :dateEnd)";

      $connection = Connection::connect();
      $statement = $connection->prepare($sql);

      $event = $calendar->getEvent();
      $idEvent = $event->getIdEvent();

      $placeEvent = $calendar->getPlaceEvent();
      $idPlaceEvent = $placeEvent->getIdPlaceEvent();

      $dateStart = $calendar->getDateStart();
      $dateEnd = $calendar->getDateEnd();

      $statement->execute(array(
        ":event" => $idEvent,
        ":placeEvent" => $idPlaceEvent,
        ":dateStart" => $dateStart,
        ":dateEnd" => $dataEnd,
      ));

      return $connection->lastInsertId();

    } catch(\PDOException $e)
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
    try
    {
      $sql = "SELECT * FROM $this->table WHERE id_calendar = $id";

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
      $sql = "UPDATE $this->table SET id_event = :event AND id_place_event = :placeEvent AND date_start = :dateStart AND date_end = :dateEnd WHERE id_calendar = :id";

      $connection = Connection::connect();
  		$statement = $connection->prepare($sql);

      $event = $value->getEvent();
      $idEvent = $event->getIdEvent();

      $placeEvent = $value->getPlaceEvent();
      $idPlaceEvent = $placeEvent->getIdPlaceEvent();

      $dateStart = $value->getDateStart();
      $dateEnd = $value->getDateEnd();

      $statement->execute(array(
        ":event" => $idEvent,
        ":placeEvent" => $idPlaceEvent,
        ":dateStart" => $dateStart,
        ":dateEnd" => $dataEnd,
      ));

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
				$u = new Calendar();

        $event = $u->getEvent();
        $idEvent = $event->getIdEvent();

        $placeEvent = $u->getPlaceEvent();
        $idPlaceEvent = $placeEvent->getIdPlaceEvent();

				$u->setEvent($idEvent)
				->setPlaceEvent($idPlaceEvent)
				->setDateStart($p["date_start"])
        ->setDateEnd($p["date_end"])
				->setIdCalendar($p['id_calendar']);

				$collection->add($u);
			}

			$this->list = $collection;

	}
}












}
