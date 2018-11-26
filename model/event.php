<?php
namespace model;

//Use

class Event
{
  private $idEvent,$category,$title;

  public function __construct($idEvent="",$category="", $title="")
  {
    $this->idEvent = $idEvent;
    $this->category = $category;
    $this->title = $title;
  }

  // getters

  public function getIdEvent()
  {
    return $this->idEvent;
  }

  public function getCategory()
  {
    return $this->category;
  }

  public function getTitleEvent()
  {
    return $this->title;
  }

  //setters

  public function setIdEvent($value):void
  {
    $this->idEvent = $value;
  }

  public function setCategory($value):void
  {
    $this->category = $value;
  }

  public function setTitleEvent($value):void
  {
    $this->title = $value;
  }

}
