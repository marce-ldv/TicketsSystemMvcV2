<?php

namespace model\test;

use helpers\Collection;

use model\test\Model as Model;

class Category extends Model
{

  private $idCategory;
  private $product;

  public function __construct () {
    $this->product = new Collection();
  }

  //GETTERS

  public function getIdCategory()
  {
    return $this->idCategory;
  }

  public function getProduct()
  {
    return $this->product;
  }

  //SETTERS

  public function setIdCategory($value) {
    $this->idCategory = $value;
    return $this;
  }

  //COLECCTION
  public function addProduct($value)
  {
    $this->product->add($value);
    return $this;
  }

}
