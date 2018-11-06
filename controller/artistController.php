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
		$this->artistDao = ArtistDAO::getInstance(); // te devuelve la instancia de la bbdd de artista
	}

	public function save($name)
	{

		$nuevoArtist = new Artist($name);
		$mensaje[0] = "El artista se ha agregado exitosamente :D ";
		$mensaje[1] = "success";
		try{
			$this->artistDao->create($nuevoArtist);
		}catch(\PDOException $e){
			$mensaje[0] = "UPS! ERROR PDO: " . $e->getMessage() . "| CODE: " . $e->getCode();
			$mensaje[1] = "danger";

		}catch(\Exception $e){
			$mensaje[0] = "UPS! ERROR EXCEPTION: " . $e->getMessage() . "| CODE: " . $e->getCode();
			$mensaje[1] = "danger";
		}

		$this->render("viewArtist/artistCreate");
	}

	public function create($artistPost = [])
	{
		if ( ! $this->isLogged()) {
			$this->redirect("/");
		}

		$messageOk = "";
		$messageWrong = "";

		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			//
			$artistDao = ArtistDAO::getInstance();

			$artist = new Artist();
			$artist->setName($artistPost["name"]);
			$artist->setSurname($artistPost["surname"]);
			$artist->setNickname($artistPost["nickname"]);

			if ( ! $artistDao->create($artist) ) {
				$messageWrong = "nose puedo crear :'v";
			} else {
				$messageOk = ":D:D:D:D:D:D:D:";
			}

		}

		$this->render("viewArtist/artistCreate", array(
			"messageWrong" => $messageWrong,
			"messageOk" => $messageOk
		));
	}

	public function list() //listar todo
	{
		$listArtists = $this->artistDao->readAll();

		if( ! $this->isLogged())
		$this->redirect('/default/login');
		else
		$this->render("viewArtist/listArtist",array(
			'listArtists' => $listArtists
		));

	}

    public function delete($id)
    {
        $searchedArtist = $this->artistDao->delete($id);
        $this->list(); // reutilizo el list()
    }


    public function update($nombre)
    {
    	$artist = new Artist($nombre);

    	// se muestra que se modifico correctamente el artista
    		$mensaje['mensaje'] = "EL ARTISTA SE MODIFICO CON EXITO !";
    		$mensaje['tipo'] = "success";

    	try
    	{
    		$this->artistDao->update($artist);
    	}
    	catch(\PDOException $e)
    	{
    		$mensaje['mensaje'] = "UPS! ERROR PDO: " . $e->getMessage() . "| CODE: " . $e->getCode();
	    	$mensaje['tipo'] = "danger";
    	}
    	catch(\Exception $e){
	    	$mensaje['mensaje'] = "UPS! ERROR EXCEPTION: " . $e->getMessage() . "| CODE: " . $e->getCode();
	    	$mensaje['tipo'] = "danger";
	    }




		$searchedArtist = $this->artistDao->read($id_artist); // artista buscado


		include URL_VIEW . 'header.php';
	    require(URL_VIEW . "viewArtist/updateArtist.php");
	    include URL_VIEW . 'footer.php';

    }

    public function updateView($id)
    {
    	$searchedArtist = $this->artistDao->read($id); // artista buscado


    	include URL_VIEW . 'header.php';
	    require(URL_VIEW . "viewArtist/updateArtist.php");
	    include URL_VIEW . 'footer.php';
    }


}
