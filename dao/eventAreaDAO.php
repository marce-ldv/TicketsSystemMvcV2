<?php
namespace dao;

use model\EventArea as EventArea;
use interfaces\ICrud as ICrud;
use helpers\Collection as Collection;
use dao\TypeAreaDAO as TypeAreaDAO;
//use dao\;

class EventAreaDAO extends SingletonDAO implements ICrud
{
  private $table = "events_area";
	private $list = array();
	private static $instance;
	private $pdo;

	public function __construct()
	{
		$this->pdo = new Connection();
	}

  public function create(&$eventArea)
  {
    try
    {
      $typeArea = new Ty

      $sql = "INSERT INTO $this->table (quantityAvaliable, price, remainder) VALUES (:quantityAvaliable, :price, :remainder)";

      $connection = Connection::connect(); // probar si funciona $connection = Connection::connect();
  		$statement = $connection->prepare($sql);

      $statement->execute()

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


}
