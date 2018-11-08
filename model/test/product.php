<?php

namespace model\test;

use model\test\Model as Model;

class Product extends Model
{

  private $idProduct;
  private $category;

  //GETTERS

  public function getIdProduct()
  {
    return $this->idProduct;
  }

  public function getCategory()
  {
    return $this->category;
  }

  //SETTERS

  public function setIdProduct($value) {
    $this->idCategory = $value;
    return $this;
  }

  public function setCategory($value)
  {
    $this->category = $value;
    return $this;
  }

}
