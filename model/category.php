<?php

namespace model;

class Category
{

  private $idCategory;
  private $nameCategory;
  private $description;

  public function __construct($nameCategory, $description)
  {
    $this->nameCategory = $nameCategory;
    $this->description = $description;
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

  public function getDescription()
  {
    return $this->description;
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


  public function setDescription($value)
  {
    $this->description = $value;
    return $this;
  }

}
