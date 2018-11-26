<?php
namespace model;

//USES


class EventArea
{
  private $idEventArea,$typeArea,$calendar,$quantityAvaliable,$price,$remainder;

  public __construct($idEventArea="",$typeArea="",$calendar="",$quantityAvaliabl="",$price="",$remainder=""){

  }

  //GETTER
  public function getIdEventArea()
  {
    return $this->id_event_area;
  }

  public function getTypeArea()
  {
    return $this->typeArea;
  }

  public function getCalendar()
  {
    return $this->calendar;
  }

  public function getQuantityAvaliable()
  {
    return $this->quantityAvaliable;
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function getRemainder()
  {
    return $this->remainder;
  }

  //SETTERS

  public function setIdEventArea($value) : void
  {
    $this->id_event_area = $value;
  }

  //modificas el id
  public function setTypeArea($value) : void
  {
    $this->typeArea = $value;
  }

  //modificas el id
  public function setCalendar($value) : void
  {
    $this->calendar = $value;
  }

  public function setQuantityAvaliable($value) : void
  {
    $this->quantityAvaliable = $value;
  }

  public function setPrice($value) : void
  {
    $this->price = $value;
  }

  public function setRemainder($value) : void
  {
    $this->remainder = $value;
  }
}
