<?php
namespace model;

use model\Purchases;
use model\EventAreas;

class LinePurchase
{
  private $idLinePurchases,$purchases,$quantity,$price;

  public __construct($idLinePurchases="",$purchases="",$quantity="",$price=""){
    $this->idLinePurchases = $idLinePurchases;
    $this->purchases = $purchases;
    $this->quantity = $quantity;
    $this->price = $price;
  }

  //GETTERS
  public function getIdLinePurchases()
  {
    return $this->idLinePurchases;
  }
  public function getPurchases()
  {
    return $this->purchases;
  }

  public function getQuantity()
  {
    return $this->quantity;
  }
  public function get()
  {
    return $this->price;
  }

  //SETTERS

  public setIdLinePurchases ($value) {
    $this->idLinePurchases = $value;
  }

  public function setPurchases(Purchases $value):void
  {
    $this->purchases = $value;
  }

  public function setQuantity($value):void
  {
    $this->quantity = $value;
  }
  public function setPrice($value):void
  {
    $this->price = $value;
  }
}
