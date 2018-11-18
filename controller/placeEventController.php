<?php

namespace controller;

use model\PlaceEvent as PlaceEvent;
use dao\PlaceEventDAO as PlaceEventDAO;
use controller\Controller as Controller;
use interfaces\IAlmr as IAlmr;

class PlaceEventController extends Controller implements IAlmr
{
    private $controllerDao;

    public function __construct () {
        parent::__construct();
        $this->controllerDao = PlaceEventDAO::getInstance();
    }

    public function index () {
        $this->list();
    }

    public function add ($data = []) {
        //create -> La llave es el campo en la base de dato y el valor es el valor a guardar en la base de dato
        $this->controllerDao->create([
          "capacity" => $data["capacity"],
          "_description" => $data["description"]
        ]);

        $this->redirect("/placeEvent/");

        return;
    }

    public function list () {
		if ( ! $this->isLogged()) {
			$this->redirect('/default/login');
		}
		else {

			$items = $this->controllerDao->readAll();

      $items = $this->controllerDao->mapMethodCollection($items);

			$this->render("viewPlaceEvent/PlacesEvents",[
				'items' => $items
			]);
		}
    }

    public function remove($data = []) {

		$this->controllerDao->delete([
      "id_place_event" => $data['idPlaceEvent']
    ]);

		$this->redirect("/placeEvent/");
	}

	public function viewEdit ($id) {

		$searchedItem = $this->controllerDao->read([
      "id_place_event" => $id
    ]);

    $searchedItem = $this->controllerDao->mapMethod($searchedItem);

		$this->render('viewPlaceEvent/updatePlaceEvent',[
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
        "capacity" => $data["capacity"],
        "_description" => $data["description"]
      ],[
        "id_place_event" => $data["idPlaceEvent"]
      ]);
    }
    catch(\PDOException $e)
    {
      echo $e->getMessage();
    }
    catch(\Exception $e){
      echo $e->getMessage();
    }

    $this->redirect('/placeEvent/');

  }
}// <----- end CLASS
