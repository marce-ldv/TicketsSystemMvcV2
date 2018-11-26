<?php
namespace model;

class Artist
{
	private $idArtist;
	private $nameArtist;
	private $surname;
	private $nickname;

	public function __construct($idArtist = "",$nickname = "",$nameArtist = "", $surname = "")
	{
		$this->idArtist = $idArtist;
		$this->nickname = $nickname;
		$this->nameArtist = $nameArtist;
		$this->surname = $surname;
	}

    //GETTERS

    public function getIdArtist()
    {
    	return $this->idArtist;
    }

    public function getNameArtist()
    {
    	return $this->nameArtist;
    }

	public function getSurname()
	{
		return $this->surname;
	}

	public function getNickname()
	{
		return $this->nickname;
	}

	//SETTERS

	public function setIdArtist ($value) : void
	{
		$this->idArtist = $value;
	}

	public function setNameArtist($value) :void
	{
		$this->nameArtist = $value;
	}

	public function setSurname($value) :void
	{
		$this->surname = $value;
	}

	public function setNickname($value) :void
	{
		$this->nickname = $value;
	}

}
