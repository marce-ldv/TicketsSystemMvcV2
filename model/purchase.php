<?php
namespace model;

use model\User;
use helpers\Collection;
use mode\LinesPurchases;

class Purchase
{
  $id_purchases;
  $linesPurchases = new Collection();
  $user;
  $datePurchase;

  //GETTERS

  public function getId() {
    return $this->id_purchase;
  }

  public function getUser()
  {
    return $this->user;
  }

  public function getDatePurchase() {
    return $this->datePurchase;
  }

  public function getLinesPurchases () {
    return $this->linesPurchases;
  }

  //SETTERS

  public function setUser(User $user)
  {
    $this->user;
    return $this;
  }

  public function setDatePurchase($value)
  {
    $this->datePurchase;
    return $this;
  }

  //Collection
  public function addLinePurchase (LinesPurchases $value) {
    $this->linesPurchases->add($value);
    return $this->linesPurchases;
  }

}
