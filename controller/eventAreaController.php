<<?php

namespace controller;

use model\EventArea as EventArea;
use dao\EventAreaDAO as EventAreaDAO;
use controller\Controller as Controller;

//seria plaza_evento
class EventAreaController extends Controller
{
  private $eventAreaDao;

  function __construct()
  {
    parent::__construct();
    $this->eventAreaDao = EventAreaDAO::getInstance();
  }

  public function index()
  {
      $eventAreas = $this->eventAreaDao->readAll();

      $this->render("viewEventArea/createEventArea",[
        "eventAreas" => $eventAreas
      ]);
  }

  public function save($eventAreaData = [])
  {
    $newEventArea = new EventArea();

    $typeArea = $eventArea->getTypeArea();
    $idTypeArea = $typeArea->getIdTypeArea();

    $calendar = $eventArea->getCalendar();
    $idCalendar = $calendar->getIdCalendar();

    $newEventArea->setTypeArea($idTypeArea)
    ->setCalendar($idCalendar)
    ->setQuantityAvaliable($eventAreaData["quantity_avaliable"])
    ->setPrice($eventAreaData["price"])
    ->setRemainder($eventAreaData["remainder"]);

    $this->eventAreaDao->create($newEventArea);

    $this->redirect("/eventArea/");
  }

  public function create()
	{
		if( ! $this->isLogged())
		$this->redirect('/default/login');
		else
		$this->render("viewEventArea/createEventArea");
    // ver si se redirije a esta vista o tiene otro nombre
	}

  public function list() //listar todo
  {
    $listEventArea = $this->eventAreaDao->readAll();

    if( ! $this->isLogged())
    $this->redirect('/default/login');
    else
    $this->render("viewEventArea/createEventArea",array(
      'listEventAreas' => $listEventAreas
    ));
	}

  public function delete($id)
	{
		$searchedEventArea = $this->eventAreaDao->delete($id);
		$this->redirect("/eventArea/");
	}

  public function updateC($eventAreaData = [])
  {
    $newEventArea = new EventArea();

    $typeArea = $eventArea->getTypeArea();
    $idTypeArea = $typeArea->getIdTypeArea();

    $calendar = $eventArea->getCalendar();
    $idCalendar = $calendar->getIdCalendar();

    $newEventArea->setTypeArea($idTypeArea)
    ->setCalendar($idCalendar)
    ->setQuantityAvaliable($eventAreaData["quantity_avaliable"])
    ->setPrice($eventAreaData["price"])
    ->setRemainder($eventAreaData["remainder"]);

    try
    {
      $this->eventAreaDao->update($eventArea);
    }
    catch(\PDOException $e)
    {
      echo $e->getMessage();
    }
    catch(\Exception $e){
      echo $e->getMessage();
    }

    $searchedEventArea = $this->eventAreaDao->read($id_event_area); // calendario buscado

    $this->render("viewEventArea/updateEventArea");

    $this->redirect('/eventArea/');

}
