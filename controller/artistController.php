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
		$newArtist = new Artist(
			'',
			$artistData["nickname"],
			$artistData["surname"]
		);

		$this->artistDao->create($newArtist);

		//$this->redirect("/artist/");
		return $this->index();
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
      'listArtists' => $listArtists
    ));
	}


	public function delete($data = [])
	{
		$searchedArtist = $this->artistDao->delete($data['id']);
		$this->redirect("/artist/");
	}

	public function updateC($artistData = [])
	{
		if ( ! $this->isMethod("POST")) $this->redirect("/default/");
    	if (empty($artistData)) $this->redirect("/default/");
<<<<<<< HEAD
		$artist = new Artist();

		$artist->setIdArtist($artistData["id"])
		->setName($artistData["name"])
		->setNickname($artistData["nickname"])
		->setSurname($artistData["surname"]);

=======
		$artist = new Artist(
			$artistData["id"],
			$artistData["name"],
			$artistData["nickname"],
			$artistData["surname"]
		);
>>>>>>> c3f8aebc8e826a3e6d23a6970c605c687a666585
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

	public function viewEditArtist($id){
		$searchedArtist = $this->artistDao->read($id);
		$this->render('viewArtist/updateArtist',[
			'searchedArtist' => $searchedArtist
		]);
	}

}
