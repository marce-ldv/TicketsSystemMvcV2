<?php

namespace dao;

use model\Calendar as Calendar;
use interfaces\ICrud as ICrud;
use helpers\Collection as Collection;
use dao\Singleton as Singleton;
use dao\EventDAO as EventDAO;
use dao\PlaceEventDAO as PlaceEvent;

class CalendarDAO extends Singleton implements ICrud
{
  private $list = array();
  private $eventDao;
  private $placeEvent;
  private static $instance;
  private $pdo;

  public function __construct()
  {
    $this->pdo = new Connection();
    $this->table = "calendars";
    $this->eventDao = EventDAO::getInstance();
    $this->placeEventDao = PlaceEventDAO::getInstance();
  }

  public function mapMethodCollection($dataSet)
	{
		$collection = new Collection();
		foreach ($dataSet as $p) {
      //Event
			$event = $this->eventDao->read([
				"id_event" => $p['id_event']
			]);
			$event = $this->eventDao->mapMethod($event);
      //Place Event
      $placeEvent = $this->placeEventDao->read([
        "id_place_event" => $p["id_place_event"]
      ]);
      $placeEvent = $this->placeEventDao->mapMethod($placeEvent);

			$u = new Calendar(
				$p['id_calendar'],
				$event,
				$placeEvent,
        $p["date_start"],
        $p["date_end"]
			);
			$collection->add($u);
		}

		return $collection;
	}

	public function mapMethod ($p) {
    //Event
    $event = $this->eventDao->read([
      "id_event" => $p['id_event']
    ]);
    $event = $this->eventDao->mapMethod($event);
    //Place Event
    $placeEvent = $this->placeEventDao->read([
      "id_place_event" => $p["id_place_event"]
    ]);
    $placeEvent = $this->placeEventDao->mapMethod($placeEvent);

    $u = new Calendar(
      $p['id_calendar'],
      $event,
      $placeEvent,
      $p["date_start"],
      $p["date_end"]
    );
		return $u;
	}
}
