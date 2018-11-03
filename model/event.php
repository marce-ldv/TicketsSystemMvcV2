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

  public function getCategoryEvent()
  {
    return $this->category;
  }

  public function getTitleEvent()
  {
    return $this->title;
  }

  //setters

  public function setCategoryEvent($categoryReceived)
  {
    $this->category = $category;
    return $this;
  }

  public function setTitleEvent($titleReceived)
  {
    $this->title = $title;
    return $this;
  }

}
