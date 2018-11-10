<?php

namespace controller;

use model\Event as Event;
use dao\EventDAO as EventDAO;
use controller\Controller as Controller;

class EventController extends Controller
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

  public function save($category, $title)
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

  public function create()
  {
    if( ! $this->isLogged())
    $this->redirect('/default/login');
    else
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


  public function update($category,$title)
  {
    $event = new Event($category, $title);

    try
    {
      $this->eventDao->update($event);
    }
    catch(\PDOException $e)
    {
      $e->getMessage();
    }
    catch(\Exception $e){
      $e->getMessage();
    }

    $searchedEvent = $this->eventDao->read($id_event); // evento buscado

<<<<<<< HEAD
    $this->render("viewEvent/updateEvent")

    require(URL_VIEW . "viewEvent/updateEvent.php");
=======
    $this->render('viewEvent/updateEvent');
>>>>>>> 15e3e84dd6e02d48a1294e7df8842b2219e32173
  }

}
