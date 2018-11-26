<?php
namespace model;

/*id_place_event BIGINT UNSIGNED AUTO_INCREMENT,
capacity BIGINT NOT NULL,
description VARCHAR(50),*/

class PlaceEvent
{
  private $idPlaceEvent,$capacity,$description;

  function __construct($idPlaceEvent="",$capacity="", $description="")
  {
      $this->idPlaceEvent=$idPlaceEvent;
      $this->capacity = $capacity;
      $this->description = $description;
  }

  /**
     * @return mixed
     */
    public function getIdPlaceEvent()
    {
        return $this->idPlaceEvent;
    }

    /**
     * @param mixed $id_place
     *
     * @return self
     */
    public function setIdPlaceEvent($idPlaceEvent):void
    {
        $this->idPlaceEvent = $idPlaceEvent;
    }

    /**
     * @return mixed
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @param mixed $capacity
     *
     * @return self
     */
    public function setCapacity($capacity):void
    {
        $this->capacity = $capacity;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     *
     * @return self
     */
    public function setDescription($description):void
    {
        $this->description = $description;
    }



}
