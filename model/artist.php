<?php
namespace model;

class Artist
{
	private $idArtist;
	private $name;
	private $surname;
	private $nickname;

/*	public function __construct($name, $surname, $nickName)
	{
		$this->name = $name;
		$this->surname = $surname;
		$this->nickName = $nickName;
	}*/

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

		public function setIdArtist ($value) {
			$this->idArtist = $value;
			return $this;
		}

		public function setName($value){
			$this->name = $value;
			return $this;
		}

		public function setSurname($value)
		{
			$this->surname = $value;
			return $this;
		}

		public function setNickname($value)
		{
			$this->nickname = $value;
			return $this;
		}

}
