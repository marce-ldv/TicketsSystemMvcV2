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
    private $idFacebook;
    private $idTwitter;
    private $idGoogle;


    public function __construct ($username = "", $pass ="", $email = "", $name = "", $surname = "", $dni = "") {
      $this->username = $username;
      $this->pass = $pass;
      $this->email = $email;
      $this->nameUser = $name;
      $this->surname = $surname;
      $this->dni = $dni;
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
    public function getIdFacebook()
    {
      return $this->idFacebook;
    }
    public function getIdTwitter()
    {
      return $this->idTwitter;
    }
    public function getIdGoogle()
    {
      return $this->idGoogle;
    }

    //SETTERS
    public function setIdUser($value) {
      $this->idUser = $value;
      return $this;
    }

    public function setRoleUser($value)
    {
      $this->roleUser = $value;
      return $this;
    }
    public function setUsername($value)
    {
      $this->username = $value;
      return $this;
    }
    public function setPass($value)
    {
      $this->pass = $value;
      return $this;
    }
    public function setEmail($value)
    {
      $this->email = $value;
      return $this;
    }
    public function setNameUser($value)
    {
      $this->nameUser = $value;
      return $this;
    }
    public function setSurname($value)
    {
      $this->surname = $value;
      return $this;
    }
    public function setDni($value)
    {
      $this->dni = $value;
      return $this;
    }


}
