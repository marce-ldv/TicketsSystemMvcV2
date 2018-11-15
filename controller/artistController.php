<?php

namespace controller;

use model\Artist as Artist;
use dao\ArtistDAO as ArtistDAO;
use controller\Controller as Controller;

class ArtistController extends Controller{

	private $artistDao;

	public function __construct()
	{
		parent::__construct();
		$this->artistDao = ArtistDAO::getInstance();
	}

	public function index () {
		$artists = $this->artistDao->readAll();

		$this->render("viewArtist/artists",[
			"artists" => $artists
		]);
	}

	public function save($artistData = [])
	{
		$newArtist = new Artist();

		$newArtist->setNickname($artistData["nickname"])
		->setName($artistData["name"])
		->setSurname($artistData["surname"]);

		$this->artistDao->create($newArtist);

		$this->redirect("/artist/");
	}

	public function create()
	{
		if( ! $this->isLogged())
		$this->redirect('/default/login');
		else
		$this->render("viewArtist/artists");
	}

	public function list() //listar todo
  {
    $listArtists = $this->artistDao->readAll();

    if( ! $this->isLogged())
    $this->redirect('/default/login');
    else
    $this->render("viewArtist/artists",array(
      'listArtist' => $listArtist
    ));
	}


	public function delete($data = [])
	{
		$searchedArtist = $this->artistDao->delete($data['id']);
		$this->redirect("/artist/");
	}



	public function updateC($artistData = [])
	{
		$newArtist = new Artist();

		$newArtist->setName($artistData["name"])
		->setNickname($artistData["nickname"])
		->setSurname($artistData["surname"]);

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

		$searchedArtist = $this->artistDao->read($id_artist); // artista buscado

		$this->render("viewArtist/updateArtist");

		$this->redirect('/artist/');

	}

}
