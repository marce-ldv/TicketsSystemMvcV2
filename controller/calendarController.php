<?php

namespace controller;

use model\Calendar as Calendar;
use dao\CalendarDAO as CalendarDAO;
use dao\EventDAO as EventDAO;
use dao\PlaceEventDAO as PlaceEventDAO;
use controller\Controller as Controller;
use interfaces\IAlmr as IAlmr;

class CalendarController extends Controller implements IAlmr
{
  private $controllerDao;
  private $eventDao;
  private $placeEventDao;

  function __construct()
  {
    parent::__construct();
    $this->controllerDao = CalendarDAO::getInstance();
    $this->eventDao = EventDAO::getInstance();
    $this->placeEventDao = PlaceEventDAO::getInstance();
  }

  public function index () {
		$this->list();
	}

	public function add ($data = []) {
			//create -> La llave es el campo en la base de dato y el valor es el valor a guardar en la base de dato
			$this->controllerDao->create([
				"id_place_event" => $data["idPlaceEvent"],
        "id_event" => $data["idEvent"],
				"date_start" => $data["dateStart"],
        "date_end" => $data["dateEnd"]
			]);

			$this->redirect("/calendar/");

			return;
	}

	public function list () {
	if ( ! $this->isLogged()) {
		$this->redirect('/default/login');
	}
	else {

		$items = $this->controllerDao->readAll();
		$items = $this->controllerDao->mapMethodCollection($items);

    $events = $this->eventDao->readAll();
    $events = $this->eventDao->mapMethodCollection($events);

    $placeEvents = $this->placeEventDao->readAll();
    $placeEvents = $this->placeEventDao->mapMethodCollection($placeEvents);

		$this->render("viewCalendar/calendars",[
			'items' => $items,
      'events' => $events,
      'placeEvents' => $placeEvents
		]);
	}
	}

	public function remove($data = []) {

	$this->controllerDao->delete([
		"id_calendar" => $data['idCalendar']
	]);

	$this->redirect("/calendar/");
}

public function viewEdit ($id) {

	$searchedItem = $this->controllerDao->read([
		"id_calendar" => $id
	]);
	$searchedItem = $this->controllerDao->mapMethod($searchedItem);

  $events = $this->eventDao->readAll();
  $events = $this->eventDao->mapMethodCollection($events);

  $placeEvents = $this->placeEventDao->readAll();
  $placeEvents = $this->placeEventDao->mapMethodCollection($placeEvents);

	$this->render('viewCalendar/updateCalendar',[
		'searchedItem' => $searchedItem,
    'events' => $events,
    'placeEvents' => $placeEvents
	]);
}

public function modify($data = [])
{
	if ( ! $this->isMethod("POST")) $this->redirect("/default/");
	if (empty($data)) $this->redirect("/default/");

	try
	{
		$this->controllerDao->update([
			"id_event" => $data["idEvent"],
			"id_place_event" => $data["idPlaceEvent"],
			"date_start" => $data["dateStart"],
      "date_end" => $data["dateEnd"]
		],[
			"id_calendar" => $data["idCalendar"]
		]);
	}
	catch(\PDOException $e)
	{
		echo $e->getMessage();
	}
	catch(\Exception $e){
		echo $e->getMessage();
	}

	$this->redirect('/calendar/');

}

}
