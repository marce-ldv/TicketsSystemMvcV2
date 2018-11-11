<?php

namespace model;

class Calendar
{
  private $id_calendar;
  private $event;
  private $placeEvent;
  private $dateStart;
  private $dateEnd;

  function __construct($event, $placeEvent, $dateEnd, $dateStart)
  {
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
      return $this->id_calendar;
  }

  /**
   * @param mixed $id_calendar
   *
   * @return self
   */
  public function setIdCalendar($id_calendar)
  {
      $this->id_calendar = $id_calendar;

      return $this;
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
  public function setEvent($event)
  {
      $this->event = $event;

      return $this;
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
  public function setPlaceEvent($placeEvent)
  {
      $this->placeEvent = $placeEvent;

      return $this;
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
  public function setDateStart($dateStart)
  {
      $this->dateStart = $dateStart;

      return $this;
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

      return $this;
  }

}
