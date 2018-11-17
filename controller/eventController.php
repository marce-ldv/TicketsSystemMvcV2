<?php

namespace controller;

use model\Event as Event;
use dao\EventDAO as EventDAO;
use controller\Controller as Controller;
use interfaces\IAlmr as IAlmr;

class EventController extends Controller implements IAlmr
{
  private $eventDao;

  public function __construct()
  {
    parent::__construct();
    $this->eventDAO = EventDAO::getInstance();
  }

  public function index () {
    $events = $this->eventDAO->readAll();

    $this->render("viewEvent/events",[
      "events" => $events
    ]);
  }

  public function add($category, $title)
  {

    $newEvent = new Event($category, $title);

    try{
      $this->eventDao->create($newEvent);

    }catch(\PDOException $e){
      echo $e->getMessage();
    }catch(\Exception $e){
      echo $e->getMessage();
    }

    $this->render("viewEvent/createEvent");
  }

  public function list() //listar todo
  {
    $listEvents = $this->eventDao->readAll();

    if( ! $this->isLogged())
    $this->redirect('/default/login');
    else
    $this->render("viewEvent/listEvent",array(
      'listEvent' => $listEvent
    ));

  }

  public function delete($id)
  {
    $searchedEvent = $this->eventDao->delete($id);
    $this->list(); // reutilizo el list()
  }


  public function modify($category,$title)
  {
    $event = new Event($category, $title);
    try
    {
      $this->eventDao->update($event);
    }
    catch(\PDOException $e)
    {
      $mensaje['mensaje'] = "UPS! ERROR PDO: " . $e->getMessage() . "| CODE: " . $e->getCode();
      $mensaje['tipo'] = "danger";
    }
    catch(\Exception $e){
      $mensaje['mensaje'] = "UPS! ERROR EXCEPTION: " . $e->getMessage() . "| CODE: " . $e->getCode();
      $mensaje['tipo'] = "danger";
    }

    $searchedEvent = $this->eventDao->read($id_event); // evento buscado

    $this->render("viewEvent/updateEvent");

    require(URL_VIEW . "viewEvent/updateEvent.php");
  }

  public function viewEdit ($id) {
		$searchedItem = $this->controllerDao->read($id);
		$this->render('viewTypeArea/updateTypeArea',[
			'searchedItem' => $searchedItem
		]);
	}

}
