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

  public function getDescriptionCategory()
  {
    return $this->description;
  }

  //SETTERS

  public function setIdCategory($value)
  {
    $this->idCategory = $value;
    return $this;
  }

  public function setDescriptionCategory($value)
  {
    $this->description = $value;
    return $this;
  }

}
