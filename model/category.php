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

  //SETTERS

  public function setIdUser($value)
  {
    $this->description = $value;
    return $this;
  }

}
