<?php

namespace model;

class Category
{

  private $idCategory;
  private $description;

  //GETTERS

  public function getIdCategory()
  {
    return $this->idCategory;
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

  public function setDescription($value)
  {
    $this->description = $value;
    return $this;
  }

}
