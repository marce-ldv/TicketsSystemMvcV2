<?php

namespace model;

class Ticket
{
  private $idTicketNumber;
  private $qr;

  public function __construct($idTicketNumber="", $qr="")
  {
    $this->idTicketNumber = $idTicketNumber;
    $this->qr = $qr;
  }

  /**
   * @return mixed
   */
  public function getIdTicketNumber()
  {
      return $this->idTicketNumber;
  }



  /**
   * @return mixed
   */
  public function getQr()
  {
      return $this->qr;
  }


  /**
   * @param mixed $idTicketNumber
   *
   * @return self
   */
  public function setIdTicketNumber($idTicketNumber):void
  {
      $this->idTicketNumber = $idTicketNumber;
  }

//SETTERS


  /**
   * @param mixed $qr
   *
   * @return self
   */
  public function setQr($qr):void
  {
      $this->qr = $qr;
  }

}
