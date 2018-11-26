<?php

namespace model;

class Category
{

  private $idCategory,$nameCategory;

  public function __construct($idCategory="",$nameCategory="")
  {
    $this->idCategory = $idCategory;
    $this->nameCategory = $nameCategory;
  }

  //GETTERS

  public function getIdCategory()
  {
    return $this->idCategory;
  }

  public function getNameCategory()
  {
    return $this->nameCategory;
  }


  //SETTERS

  public function setIdCategory($value) :void {
    $this->idCategory = $value;
  }

  public function setNameCategory($value) :void {
    $this->nameCategory = $value;
  }

}
