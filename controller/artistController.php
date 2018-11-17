<?php

namespace controller;

use model\Artist as Artist;
use dao\ArtistDAO as ArtistDAO;
use controller\Controller as Controller;
use interfaces\IAlmr as IAlmr;

class ArtistController extends Controller implements IAlmr{

	private $artistDao;

	public function __construct()
	{
		parent::__construct();
		$this->artistDao = ArtistDAO::getInstance();
	}

	public function index () {
		$this->list();
	}

	public function add ($artistData = []) {
		$newArtist = new Artist(
			'',
			$artistData["nickname"],
			$artistData["name"],
			$artistData["surname"]
		);

		$this->artistDao->create($newArtist);

		$this->redirect("/artist/");
		return;
		//return $this->index();
	}

	public function list()  {
		if ( ! $this->isLogged()) {
			$this->redirect('/default/login');
		}
		else {
			$artists = $this->artistDao->readAll();
			$this->render("viewArtist/artists",[
				'artists' => $artists
			]);
		}
	}

	public function remove($data = [])
	{
		$searchedArtist = $this->artistDao->delete($data['id']);
		$this->redirect("/artist/");
	}

	public function viewEdit ($id) {
		$searchedItem = $this->artistDao->read($id);
		$this->render('viewArtist/updateArtist',[
			'searchedItem' => $searchedItem
		]);
	}

	public function modify($artistData = [])
	{
		if ( ! $this->isMethod("POST")) $this->redirect("/default/");
		if (empty($artistData)) $this->redirect("/default/");
		$artist = new Artist(
			$artistData["id"],
			$artistData["nickname"],
			$artistData["name"],
			$artistData["surname"]
		);
		try
		{
			$this->artistDao->update($artist);
		}
		catch(\PDOException $e)
		{
			echo $e->getMessage();
		}
		catch(\Exception $e){
			echo $e->getMessage();
		}

		$this->redirect('/artist/');

	}

}
