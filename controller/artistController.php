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

	public function save($artistData)
	{
		$nuevoArtist = new Artist();

		$nuevoArtist->setNickname($artistData["nickname"])
		->setName($artistData["name"])
		->setSurname($artistData["surname"]);

		$this->artistDao->create($nuevoArtist);

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
    $listEvents = $this->artistDao->readAll();

    if( ! $this->isLogged())
    $this->redirect('/default/login');
    else
    $this->render("viewArtist/artists",array(
      'listArtist' => $listArtist
    ));

	public function delete($id)
	{
		$searchedArtist = $this->artistDao->delete($id);
		$this->redirect("/artist/");
	}



	public function update($name, $surname, $nickName)
	{
		$artist = new Artist($name, $surname, $nickName);

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
