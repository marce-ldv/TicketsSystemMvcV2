<?php

namespace model;

class User implements \Serializable
{
    private $idUser = 0;
    private $roleUser;
    private $username;
    private $pass;
    private $email;
    private $nameUser;
    private $surname;
    private $dni;
    private $profilePicture;

    public function __construct ($idUser = "", $username = "", $pass ="", $email = "", $name = "", $surname = "", $dni = "",$profilePicture = "") {
      $this->username = $username;
      $this->pass = $pass;
      $this->email = $email;
      $this->nameUser = $name;
      $this->surname = $surname;
      $this->dni = $dni;
      $this->profilePicture = $profilePicture;
      $this->idUser = $idUser;
    }

    //SERIALIZE METHODS
    public function serialize(){
        return serialize([
            $this->username,
            $this->email,
            $this->roleUser
        ]);
    }

    public function unserialize($data){
        list(
            $this->username,
            $this->email,
            $this->roleUser
        ) = unserialize($data);
    }

    //GETTERS
    public function getIdUser()
    {
      return $this->idUser;
    }
    public function getRoleUser()
    {
      return $this->roleUser;
    }
    public function getUsername()
    {
      return $this->username;
    }
    public function getPass()
    {
      return $this->pass;
    }
    public function getEmail()
    {
      return $this->email;
    }
    public function getNameUser()
    {
      return $this->nameUser;
    }
    public function getSurname()
    {
      return $this->surname;
    }
    public function getDni()
    {
      return $this->dni;
    }

    public function getProfilePicture()
    {
      return $this->profilePicture;
    }

    //SETTERS
    public function setIdUser($value):void {
      $this->idUser = $value;
    }

    public function setRoleUser($value):void
    {
      $this->roleUser = $value;
    }
    public function setUsername($value):void
    {
      $this->username = $value;
    }
    public function setPass($value):void
    {
      $this->pass = $value;
    }
    public function setEmail($value):void
    {
      $this->email = $value;
    }
    public function setNameUser($value):void
    {
      $this->nameUser = $value;
    }
    public function setSurname($value):void
    {
      $this->surname = $value;
    }
    public function setDni($value):void
    {
      $this->dni = $value;
    }
    public function setProfilePicture($value):void
    {
      $this->profilePicture = $value;
      return $this;
    }


}
