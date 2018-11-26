<?php

namespace model;

class Calendar
{
  private $idCalendar;
  private $event;
  private $placeEvent;
  private $dateStart;
  private $dateEnd;

  public function __construct($idCalendar="", $event="", $placeEvent="", $dateStart="", $dateEnd=""){
    $this->idCalendar = $idCalendar;
    $this->event = $event;
    $this->placeEvent = $placeEvent;
    $this->dateEnd = $dateEnd;
    $this->dateStart = $dateStart;
  }

  public function getIdCalendar()
  {
      return $this->idCalendar;
  }


  public function setIdCalendar($idCalendar) :void
  {
      $this->idCalendar = $idCalendar;
  }

  public function getEvent()
  {
      return $this->event;
  }

  public function setEvent($event) :void
  {
      $this->event = $event;
  }

  public function getPlaceEvent()
  {
      return $this->placeEvent;
  }

  public function setPlaceEvent($placeEvent) :void
  {
      $this->placeEvent = $placeEvent;
  }

  public function getDateStart()
  {
      return $this->dateStart;
  }

  public function setDateStart($dateStart) :void
  {
      $this->dateStart = $dateStart;
  }

  public function getDateEnd()
  {
      return $this->dateEnd;
  }

  public function setDateEnd($dateEnd)
  {
      $this->dateEnd = $dateEnd;
  }

}
