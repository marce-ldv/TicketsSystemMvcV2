<?php
namespace model;

class Artist
{
	private $id_artist;
	private $name;

    public function __construct($nameRecib){
    	$this->name = $nameRecib;
    }

    //getters

    public function getIdArtist()
    {
    	return $this->id_artist;
    }

    public function getNameArtist()
    {
    	return $this->name;
    }

    //setters

    public function setIdArtist($idArtistRecib)
    {
    	$this->id_artist = $idArtistRecib;
    }

    public function setNameArtist($nameRecib)
    {
    	$this->name = $nameRecib;
    }

}



 ?>
