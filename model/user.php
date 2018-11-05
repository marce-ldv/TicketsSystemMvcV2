<?php

namespace model;

class User implements \Serializable
{
    private $idUser = 0;
    private $role = "user";
    private $username;
    private $pass;
    private $email;
    private $name;
    private $surname;
    private $dni;
    private $idFacebook;
    private $idTwitter;
    private $idGoogle;


    public function __construct ($username = "", $pass ="", $email = "", $name = "", $surname = "", $dni = "") {
      $this->username = $username;
      $this->pass = $pass;
      $this->email = $email;
      $this->name = $name;
      $this->surname = $surname;
      $this->dni = $dni;
    }

    //SERIALIZE METHODS

    public function serialize(){
        return serialize([
            $this->username,
            $this->email
        ]);
    }

    public function unserialize($data){
        list(
            $this->username,
            $this->email
        ) = unserialize($data);
    }

    //GETTERS
    public function getIdUser()
    {
      return $this->idUser;
    }
    public function getRole()
    {
      return $this->role;
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
    public function getName()
    {
      return $this->name;
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

    public function setRole($value)
    {
      $this->role = $value;
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
    public function setDni($value)
    {
      $this->dni = $value;
      return $this;
    }


}
