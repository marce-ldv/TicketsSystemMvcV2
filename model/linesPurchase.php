<?php
namespace model;

use model\Purchases;
use model\EventAreas;

class LinesPurchases
{
  $id_line_purchases;
  $purchases;
  $event_areas;
  $quantity;
  $price;

  //GETTERS
  public function getId()
  {
    return $this->id_line_purchase;
  }
  public function getPurchases()
  {
    return $this->purchases;
  }
  public function getEventAreas()
  {
    return $this->event_areas;
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
  public function setPurchases(Purchases $value)
  {
    $this->purchases = $value;
    return $this;
  }

  // TODO: Implementar
  public function setEventArea(EventAreas $eventAreas)
  {
    $this->eventAreas = $eventAreas;
    return $this;
  }
  public function setQuantity($value)
  {
    $this->quantity = $value;
    return $this;
  }
  public function setPrice($value)
  {
    $this->price = $value;
    return $this;
  }
}
