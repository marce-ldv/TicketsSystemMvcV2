<?php
/*id_place_event BIGINT UNSIGNED AUTO_INCREMENT,
capacity BIGINT NOT NULL,
description VARCHAR(50),*/

class PlaceEvent
{
  private $id_place;
  private $capacity;
  private $description;

  function __construct($capacity, $description)
  {
      $this->capacity = $capacity;
      $this->description = $description;
  }

  /**
     * @return mixed
     */
    public function getIdPlace()
    {
        return $this->id_place;
    }

    /**
     * @param mixed $id_place
     *
     * @return self
     */
    public function setIdPlace($id_place)
    {
        $this->id_place = $id_place;

        return $this;
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
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
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
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }




}
