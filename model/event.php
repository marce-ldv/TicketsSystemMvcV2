<?php
namespace model;

//Use

class Event
{
  private $id_event;
  private $category;
  private $title;

  // getters

  public function getIdEvent()
  {
    return $this->id_event;
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

  public function setIdEvent($value)
  {
    $this->id_event = $value;
    return $this;
  }

  public function setCategory($value)
  {
    $this->category = $value;
    return $this;
  }

  public function setTitleEvent($value)
  {
    $this->title = $value;
    return $this;
  }

}
