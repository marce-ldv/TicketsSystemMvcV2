<?php
namespace model;

//USES

class EventArea
{
  private $idEventArea;
  private $typeArea;
  private $calendar;
  private $quantityAvaliable;
  private $price;
  private $remainder;

  public function __construct($idEventArea="",TypeArea $typeArea = null,Calendar $calendar = null,$quantityAvaliable="",$price="",$remainder=""){
  	$this->idEventArea = $idEventArea;
  	$this->typeArea = $typeArea;
  	$this->calendar = $calendar;
  	$this->quantityAvaliable = $quantityAvaliable;
  	$this->price = $price;
  	$this->remainder = $remainder;
  }

  //GETTER
  public function getIdEventArea()
  {
    return $this->idEventArea;
  }
	
	/**
	 * @return TypeArea
	 */
  public function getTypeArea() : TypeArea
  {
    return $this->typeArea;
  }
	
	/**
	 * @return Calendar
	 */
  public function getCalendar() : Calendar
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
    $this->idEventArea = $value;
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
