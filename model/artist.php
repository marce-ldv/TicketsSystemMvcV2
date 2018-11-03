<?php
namespace model;

class Artist
{
	private $id_artist;
	private $name;
	private $surname;
	private $nickname;

    //GETTERS

    public function getIdArtist()
    {
    	return $this->id_artist;
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

		public function setName($value)
    {
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
			return;
		}

}
