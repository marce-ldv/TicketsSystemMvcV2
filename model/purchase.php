<?php
namespace model;

use helpers\Collection;
use mode\LinePurchase;

class Purchase
{
  private $idPurchase,$datePurchase;

  public function __construct ($idPurchase = "", $user = "", $datePurchase = "") {
    $this->idPurchase = $idPurchase;
    $this->datePurchase = $datePurchase;
  }

  //GETTERS

  public function getIdPurchase() {
    return $this->$idPurchase;
  }

  public function getDatePurchase() {
    return $this->datePurchase;
  }


  //SETTERS

  public function setIdPurchase($idPurchase):void
  {
    $this->idPurchase = $idPurchase;
  }

  public function setDatePurchase($value):void
  {
    $this->datePurchase = $value;
  }

}
