<<<<<<< HEAD
<<?php
=======
<?php
>>>>>>> b7a1ead26579c6deaf81ffe3b097da2fb9978def

namespace controller;

use model\EventArea as EventArea;
use dao\EventAreaDAO as EventAreaDAO;
use controller\Controller as Controller;
<<<<<<< HEAD

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
=======
use interfaces\IAlmr as IAlmr;

class EventAreaController extends Controller implements IAlmr
{
    private $controllerDao;

    public function __construct () {
        parent::__construct();
        $this->controllerDao = EventAreaDAO::getInstance();
    }

    public function index () {
        $this->list();
    }

    public function add ($data = []) {
        //create -> La llave es el campo en la base de dato y el valor es el valor a guardar en la base de dato
        $this->controllerDao->create([
          "id_type_area" => $data["idTypeArea"],
          "id_calendar" => $data["idCalendar"],
          "quantity_avaliable" => $data["quantityAvaliable"],
          "price" => $data["price"],
          "remainder" => $data["remainder"]
        ]);

        $this->redirect("/eventArea/");

        return;
    }

    public function list () {
		if ( ! $this->isLogged()) {
			$this->redirect('/default/login');
		}
		else {

			$items = $this->controllerDao->readAll();

      $items = $this->controllerDao->mapMethodCollection($items);

			$this->render("viewEventArea/EventsAreas",[
				'items' => $items
			]);
		}
    }

    public function remove($data = []) {

		$this->controllerDao->delete([
      "id_event_area" => $data['idEventArea']
    ]);

		$this->redirect("/eventArea/");
	}

	public function viewEdit ($id) {

		$searchedItem = $this->controllerDao->read([
      "id_event_area" => $id
    ]);

    $searchedItem = $this->controllerDao->mapMethod($searchedItem);

		$this->render('viewEventArea/updateEventArea',[
			'searchedItem' => $searchedItem
		]);
	}

  public function modify($data = [])
	{
		if ( ! $this->isMethod("POST")) $this->redirect("/default/");
		if (empty($data)) $this->redirect("/default/");

		try
		{
			$this->controllerDao->update([
        "id_type_area" => $data["idTypeArea"],
        "id_calendar" => $data["idCalendar"],
        "quantity_avaliable" => $data["quantityAvaliable"],
        "price" => $data["price"],
        "remainder" => $data["remainder"]
      ],[
        "id_event_area" => $data["idEventArea"]
      ]);
		}
		catch(\PDOException $e)
		{
			echo $e->getMessage();
		}
		catch(\Exception $e){
			echo $e->getMessage();
		}

		$this->redirect('/eventArea/');

	}

} // <----- end CLASS
>>>>>>> b7a1ead26579c6deaf81ffe3b097da2fb9978def
