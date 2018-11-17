<?php
namespace model;

class Artist
{
	private $idArtist;
	private $name;
	private $surname;
	private $nickname;

	public function __construct($idArtist = "",$name = "", $surname = "", $nickName = "")
	{
		$this->idArtist = $idArtist;
		$this->name = $name;
		$this->surname = $surname;
		$this->nickName = $nickName;
	}

    //GETTERS

    public function getIdArtist()
    {
    	return $this->idArtist;
    }

    public function getName()
    {
    	return $this->name;
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

	public function setName($value) :void
	{
		$this->name = $value;
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
