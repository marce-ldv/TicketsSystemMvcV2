<?php
namespace model;

use helpers\Collection;
use mode\LinePurchase;

class Purchase
{
  private $idPurchase;
  private $datePurchase;
  private $user;

  public function __construct ($idPurchase = "", User $user = null, $datePurchase = "") {
    $this->idPurchase = $idPurchase;
    $this->datePurchase = $datePurchase;
    $this->user = $user;
  }

  //GETTERS

  public function getIdPurchase() {
    return $this->idPurchase;
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
    
    /**
     * @return User
     */
    public function getUser (): User {
        return $this->user;
    }
    
    /**
     * @param User $user
     */
    public function setUser (User $user): void {
        $this->user = $user;
    }

}
