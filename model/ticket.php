<?php

namespace model;

class Category
{

  private $idTicketNumber;
  private $qr;

  public function getIdTicketNumber()
  {
    return $this->idTicketNumber;
  }

  public function getDescription()
  {
    return $this->description;
  }

  //SETTERS

  public function setDescription($value)
  {
    $this->description = $value;
    return $this;
  }

}
