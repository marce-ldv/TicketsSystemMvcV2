<?php
namespace model;

//USES


class EventAreas
{
  $id_event_area;
  $typeArea;
  $calendar;
  $quantityAvaliable;
  $price;
  $remainder;

  //GETTER
  public function getId()
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
  //TODO: implementar
  public function setTypeArea($value)
  {

  }
  //TODO: implementar
  public function setCalendar($value)
  {

  }

  public function setQuantityAvaliable($value)
  {
    $this->quantityAvaliable = $value;
    return $this;
  }
  public function setPrice$value()
  {
    $this->price = $value;
    return $this;
  }

  public function setRemainder($value)
  {
    $this->remainder = $value;
    return $this;
  }
}
