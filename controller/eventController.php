<?php

namespace controller;

use model\Event as Event;
use dao\EventDAO as EventDAO;
use dao\CategoryDAO as CategoryDAO;
use controller\Controller as Controller;
use interfaces\IAlmr as IAlmr;

class EventController extends Controller implements IAlmr{

	private $controllerDao;

	public function __construct()
	{
		parent::__construct();
		$this->controllerDao = EventDAO::getInstance();
	}

	public function index () {
		$this->list();
	}


	public function add ($data = []) {
			//create -> La llave es el campo en la base de dato y el valor es el valor a guardar en la base de dato

			$event = new Event(
				'',
				$data["idCategory"],
				$data["title"]
			);

			$this->controllerDao->create($event);

			$this->redirect("/event/");

			return;
	}

	public function list () {
	//if ( ! $this->isLogged()) {
		//$this->redirect('/default/login');
	//}
	//else {

		$items = $this->controllerDao->readAll();
//		$items = $this->controllerDao->mapMethodCollection($items);

    $categoryDao = CategoryDAO::getInstance();
    $categories = $categoryDao->readAll();
//    $categories = $categoryDao->mapMethodCollection($categories);

		if ($items) {
			$items = (! is_array($items)) ? [$items] : $items;
		}else {
		$items = [];
		}

		$this->render("viewEvent/events",[
			'items' => $items,
      'categories' => $categories
		]);
	//}
	}

	public function remove($data = []) {

	$this->controllerDao->delete($data['idEvent']);

	//$this->redirect("/event/");
	$this->index();
}

public function viewEdit ($id) {

	$searchedItem = $this->controllerDao->read($id);

	$categoryDao = CategoryDAO::getInstance();
	$categories = $categoryDao->readAll();
	//$categories = $categoryDao->mapMethodCollection($categories);

	//$searchedItem = $this->controllerDao->mapMethod($searchedItem);

	$this->render('viewEvent/updateEvent',[
		'searchedItem' => $searchedItem,
		'categories' => $categories
	]);
}

public function modify($data = [])
{
	if ( ! $this->isMethod("POST")) $this->redirect("/default/");
	if (empty($data)) $this->redirect("/default/");

	$event = new Event(
		$data["idEvent"],
		$data["idCategory"],
		$data["title"]
	);

  try
	{
		$this->controllerDao->update($event);
	}
	catch(\PDOException $e)
	{
		echo $e->getMessage();
	}
	catch(\Exception $e){
		echo $e->getMessage();
	}

	//$this->redirect('/event/');

	$this->index();

}

}
