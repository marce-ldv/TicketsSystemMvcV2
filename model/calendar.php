<?php

namespace model;

class Calendar
{
  private $idCalendar;
  private $event;
  private $placeEvent;
  private $dateStart;
  private $dateEnd;

  public function __construct($idCalendar="", $event="", $placeEvent="", $dateEnd="", $dateStart=""){
    $this->idCalendar = $idCalendar;
    $this->event = $event;
    $this->placeEvent = $placeEvent;
    $this->dateEnd = $dateEnd;
    $this->dateStart = $dateStart;
  }

    /**
   * @return mixed
   */
  public function getIdCalendar()
  {
      return $this->idCalendar;
  }

  /**
   * @param mixed $idCalendar
   *
   * @return self
   */
  public function setIdCalendar($idCalendar) :void
  {
      $this->idCalendar = $idCalendar;
  }

  /**
   * @return mixed
   */
  public function getEvent()
  {
      return $this->event;
  }

  /**
   * @param mixed $event
   *
   * @return self
   */
  public function setEvent($event) :void
  {
      $this->event = $event;
  }

  /**
   * @return mixed
   */
  public function getPlaceEvent()
  {
      return $this->placeEvent;
  }

  /**
   * @param mixed $placeEvent
   *
   * @return self
   */
  public function setPlaceEvent($placeEvent) :void
  {
      $this->placeEvent = $placeEvent;
  }

  /**
   * @return mixed
   */
  public function getDateStart()
  {
      return $this->dateStart;
  }

  /**
   * @param mixed $dateStart
   *
   * @return self
   */
  public function setDateStart($dateStart) :void
  {
      $this->dateStart = $dateStart;
  }

  /**
   * @return mixed
   */
  public function getDateEnd()
  {
      return $this->dateEnd;
  }

  /**
   * @param mixed $dateEnd
   *
   * @return self
   */
  public function setDateEnd($dateEnd)
  {
      $this->dateEnd = $dateEnd;
  }

}
