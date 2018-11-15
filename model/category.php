<?php

namespace model;

class Category
{

  private $idCategory;
  private $nameCategory;

/*  public function __construct($nameCategory)
  {
    $this->nameCategory = $nameCategory;
  }*/

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

  public function setIdCategory($value) {
    $this->idCategory = $value;
    return $this;
  }

  public function setNameCategory($value) {
    $this->nameCategory = $value;
    return $this;
  }

}
