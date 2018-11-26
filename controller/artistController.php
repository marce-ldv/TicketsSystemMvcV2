<?php

namespace controller;

use model\Artist as Artist;
use dao\ArtistDAO as ArtistDAO;
use controller\Controller as Controller;
use interfaces\IAlmr as IAlmr;

class ArtistController extends Controller implements IAlmr{

	private $controllerDao;

	public function __construct()
	{
		parent::__construct();
		$this->controllerDao = ArtistDAO::getInstance();
	}

	public function index () {
		echo('asdas');
		$this->list();
	}

	public function add ($data = []) {
			//create -> La llave es el campo en la base de dato y el valor es el valor a guardar en la base de dato
			$artist = new Artist(
				'',
				$data["nickname"],
				$data["name"],
				$data["surname"]
			);

			$this->controllerDao->create($artist);

			$this->redirect("/artist/");

			return;
	}

	public function list () {
	if ( ! $this->isLogged()) {
		//$this->redirect('/default/login');
	}
	else {

		$items = $this->controllerDao->readAll();

		if ($items) {
			$items = (! is_array($items)) ? [$items] : $items;
		}else {
			$items = [];
		}

//		$items = $this->controllerDao->mapMethod($items);

		$this->render("viewArtist/artists",[
			'items' => $items
		]);
	}
	}

	public function remove($data = []) {

	$this->controllerDao->delete($data['id']);

	//$this->redirect("/artist/");
	$this->index();
}

public function viewEdit ($id) {

	$searchedItem = $this->controllerDao->read($id);

//	$searchedItem = $this->controllerDao->mapMethod($searchedItem);

	$this->render('viewArtist/updateArtist',[
		'searchedItem' => $searchedItem
	]);
}

public function modify($data = [])
{
	if ( ! $this->isMethod("POST")) $this->redirect("/default/");
	if (empty($data)) $this->redirect("/default/");

	$artist = new Artist(
		$data["id"],
		$data["nickname"],
		$data["name"],
		$data["surname"]
	);

	try
	{
		$this->controllerDao->update($artist);
	}
	catch(\PDOException $e)
	{
		echo $e->getMessage();
	}
	catch(\Exception $e){
		echo $e->getMessage();
	}

	//$this->redirect('/artist/');

	$this->index();

}

}
