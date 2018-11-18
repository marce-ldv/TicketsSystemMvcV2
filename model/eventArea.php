<?php
namespace model;

//USES


class EventArea
{
  $id_event_area;
  $typeArea;
  $calendar;
  $quantityAvaliable;
  $price;
  $remainder;

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

  public function setIdEventArea($value)
  {
    $this->id_event_area = $value;
    return $this;
  }

  //modificas el id
  public function setTypeArea($value)
  {
    $this->typeArea = $value;
    return $this;
  }

  //modificas el id
  public function setCalendar($value)
  {
    $this->calendar = $value;
    return $this;

  }

  public function setQuantityAvaliable($value)
  {
    $this->quantityAvaliable = $value;
    return $this;
  }

  public function setPrice($value)
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
