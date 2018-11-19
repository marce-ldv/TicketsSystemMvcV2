<?php

namespace controller;

use model\Event as Event;
use model\Purchase as Purchase;
use dao\PurchaseDAO as PurchaseDAO;
use dao\EventDAO as EventDAO;
use dao\CategoryDAO as CategoryDAO;
use controller\Controller as Controller;
use interfaces\IAlmr as IAlmr;

class EventController extends Controller implements IAlmr{

	private $controllerDao;

	public function __construct(){
		parent::__construct();
		$this->controllerDao = PurchaseDAO::getInstance();
		$this->controllerDao = EventDAO::getInstance();
		$this->controllerDao = CategoryDAO::getInstance();
	}

	public function index () {
		$this->list();
	}


	public function add ($data = []) {
		//create -> La llave es el campo en la base de dato y el valor es el valor a guardar en la base de dato
		$this->controllerDao->create([
			"id_purchase" => $data["idPurchase"],
			"user" => $data["user"],
			"date_purchase" => $data["datePurchase"]
		]);

		$this->redirect("/purchase/");

		return;
	}

	public function list () {
	if ( ! $this->isLogged()) {
		$this->redirect('/default/login');
	}
	else {

		$items = $this->controllerDao->readAll();
		$items = $this->controllerDao->mapMethodCollection($items);

		$categoryDao = CategoryDAO::getInstance();
		$categories = $categoryDao->readAll();
		$categories = $categoryDao->mapMethodCollection($categories);

		$eventDao = EventDAO::getInstance();
		$events = $eventDao->readAll();
		$events = $eventDao->mapMethodCollection($events);

		$this->render("viewEvent/events",[
			'items' => $items,
			'categories' => $categories,
			'events' => $events
		]);
	}
	}

	public function remove($data = []) {

	$this->controllerDao->delete([
		"id_purchase" => $data['idPurchase']
	]);

	$this->redirect("/purchase/");
	}

	public function viewEdit ($id) {

		$searchedItem = $this->controllerDao->read([
			"id_purchase" => $id
		]);

		$categoryDao = CategoryDAO::getInstance();
		$categories = $categoryDao->readAll();
		$categories = $categoryDao->mapMethodCollection($categories);
	
		$eventDao = EventDAO::getInstance();
		$events = $eventDao->readAll();
		$events = $eventDao->mapMethodCollection($events);

		$searchedItem = $this->controllerDao->mapMethod($searchedItem);

		$this->render('viewEvent/updateEvent',[
		'searchedItem' => $searchedItem,
		'categories' => $categories,
		'events' => $events
		]);
	}

	public function modify($data = [])
	{
		if ( ! $this->isMethod("POST")) $this->redirect("/default/");
		if (empty($data)) $this->redirect("/default/");

		try{
			$this->controllerDao->update(
			[
			"id_purchase" => $data["idPurchase"],
			"user" => $data["user"],
			"date_purchase" => $data["datePurchase"]
			],[
			"id_event" => $data["idEvent"],
			"id_category" => $data["idCategory"]
			]);
			}
			catch(\PDOException $e)
			{
				echo $e->getMessage();
			}
			catch(\Exception $e){
				echo $e->getMessage();
			}

		$this->redirect('/purchase/');

	}

}
