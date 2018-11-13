<?php

namespace model;

class Ticket
{
  private $id_ticket_number;
  private $linePurchase;
  private $qr;

  function __construct($id_ticket_number, $linePurchase, $qr)
  {
    $this->id_ticket_number = $id_ticket_number;
    $this->linePurchase = $linePurchase;
    $this->qr = $qr;
  }

  /**
   * @return mixed
   */
  public function getIdTicketNumber()
  {
      return $this->id_ticket_number;
  }

  /**
   * @return mixed
   */
  public function getLinePurchase()
  {
      return $this->linePurchase;
  }


  /**
   * @return mixed
   */
  public function getQr()
  {
      return $this->qr;
  }


  /**
   * @param mixed $id_ticket_number
   *
   * @return self
   */
  public function setIdTicketNumber($id_ticket_number)
  {
      $this->id_ticket_number = $id_ticket_number;

      return $this;
  }

//SETTERS

  /**
   * @param mixed $linePurchase
   *
   * @return self
   */
  public function setLinePurchase($linePurchase)
  {
      $this->linePurchase = $linePurchase;

      return $this;
  }

  /**
   * @param mixed $qr
   *
   * @return self
   */
  public function setQr($qr)
  {
      $this->qr = $qr;

      return $this;
  }

}
