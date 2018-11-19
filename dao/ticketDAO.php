<?php

namespace dao;

use model\Ticket as Ticket;
use interfaces\ICrud as ICrud;
use helpers\Collection as Collection;
use dao\Singleton as Singleton;

class TicketDAO extends Singleton implements ICrud
{
	private $list = array();
	private static $instance;
	private $pdo;

	public function __construct()
	{
		$this->table = "tickets";
		$this->pdo = new Connection();
	}
/*
  public function create(&$ticket)
  {
  	try
  	{
  		$sql = "INSERT INTO $this->table (id_line_purchase, code_qr) VALUES (:linePurchase, :codeQr)";

  		$connection = Connection::connect();
  		$statement = $connection->prepare($sql);

  		$linePurchase = $ticket->getLinePurchase();
      $idLinePurchase = $linePurchase->getIdLinePurchase();

      $codeQr = $ticket->getQr();

  		$statement->execute(array(
  			":linePurchase" => $idLinePurchase,
        ":codeQr" => $codeQr,
  		));

  		return $connection->lastInsertId();
  	}
  	catch(\PDOException $e)
  	{
  		throw $e;
  	}
  	catch(Exception $e)
  	{
  		throw $e;
  	}
  }

  public function read($id)
  {
    try
    {
      $sql = "SELECT * FROM $this->table WHERE id_ticket_number = $id";

      $connection = Connection::connect();
      $statement = $connection->prepare($sql);

      $statement->execute();

      $dataSet[] = $statement->fetch(\PDO::FETCH_ASSOC);

  		// como siempre va a traer un solo objeto pongo dataSet[0] ya que estoy parado en el primer lugar
  		if($dataSet[0])
  		{
  			$this->mapMethod($dataSet);
  		}

  		if(!empty($this->list[0]))
  		{
  			return $this->list[0];
  		}

  		return false;
  	}
  	catch (\PDOException $e)
  	{
  		echo $e->getMessage();
  		die();
  	}
  	catch (Exception $e)
  	{
  		echo $e->getMessage();
  		die();
  	}

  }

  public function readAll()
  {
  	try
  	{
  		$sql = "SELECT * FROM $this->table";

  		$connection = Connection::connect();
  		$statement = $connection->prepare($sql);

  		$statement->execute();

  		$dataSet = $statement->fetchAll(\PDO::FETCH_ASSOC);

  		$this->mapMethod($dataSet);

  		return $this->list;
  	}
  	catch(\PDOException $e)
  	{
  		echo $e->getMessage();
  		die();
  	}
  	catch(Exception $e)
  	{
  		echo $e->getMessage();
  		die();
  	}
  }

  public class update($value)
  {
    try
    {
      $sql = "UPDATE $this->table SET id_ticket_number = :idTicketNumber AND id_line_purchase = :linePurchase AND code_qr = :codeQr";

      $connection = Connection::connect();
  		$statement = $connection->prepare($sql);

      $linePurchase = $value->getLinePurchase();
      $idLinePurchase = $linePurchase->getIdLinePurchase();

      $codeQr = $value->getQr();

  		$statement->execute(array(
  			":linePurchase" => $idLinePurchase,
        ":codeQr" => $codeQr,
  		));

    }
    catch(\PDOException $e)
  	{
  		echo $e->getMessage();
  		die();
  	}
  	catch(Exception $e)
  	{
  		echo $e->getMessage();
  		die();
  	}
}

  public function delete($id)
  {
    try
    {
      $sql = "DELETE FROM $this->table WHERE id_ticket_number = $id "; // si es un string poner \" $id \";

      $connection = Connection::connect();
      $statement = $connection->prepare($sql);

      $statement->execute(array(
        ":id" => $id,
    ));

    }catch(\PDOException $e)
    {
      echo $e->getMessage();
      die();
    }
    catch(Exception $e)
    {
      echo $e->getMessage();
      die();
    }
  }

  public function mapMethod($dataSet)
  {
    $dataSet = is_array($dataSet) ? $dataSet : false;

    if($dataSet)
    {
      $collection = new Collection();

      foreach ($dataSet as $p) {
        $u = new Ticket();

        $linePurchase = $u->getLinePurchase();
        $idLinePurchase = $linePurchase->getIdLinePurchase();

        $codeQr = $u->getQr();

        $u->setLinePurchase($idLinePurchase)
        ->setQr($p["code_qr"])
        ->setIdTicketNumber($p["id_ticket_number"]));

        $collection->add($u);
      }

      $this->list = $collection;
    }
  }
	*/
////////////////////////////////////////////////////////////////////////////////////////////////
	public function mapMethodCollection($dataSet)
	{
		$collection = new Collection();
		foreach ($dataSet as $p) {
			$u = new Ticket(
				$p['id_ticket_number'],
				$p["id_line_purchase"],
				$p["code_qr"]
			);
			$collection->add($u);
		}

		return $collection;
	}

	public function mapMethod ($dataSet) {
		$u = new Ticket(
			$dataSet['id_ticket_number'],
			$dataSet["id_line_purchase"],
			$dataSet["code_qr"]
		);
		return $u;
	}
}
