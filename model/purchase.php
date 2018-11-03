<?php
namespace model;

use model\User;

/**
 *
 */
class Purchase
{
  $id_purchases;
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

  public function getPurchase() {
    return $this->datePurchase;
  }

  //SETTERS

  public function setUser(User $user)
  {
    $this->user;
    return $this;
  }

  public function setdatePurchase($value)
  {
    $this->datePurchase;
    return $this;
  }
}
