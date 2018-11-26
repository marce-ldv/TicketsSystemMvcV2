<?php
	
	namespace dao;
	
	use model\EventArea as EventArea;
	use interfaces\ICrud as ICrud;
	use helpers\Collection as Collection;
	use dao\Singleton as Singleton;
	use dao\Connection as Connection;
	
	class EventAreaDAO extends Singleton implements ICrud
	{
		private $table = "events_area";
		private $list = array();
		private static $instance;
		private $pdo;
		
		public function __construct()
		{
			$this->pdo = Connection::getInstance();
		}
		
		/**
		 * @param EventArea $eventArea
		 * @throws
		 * @return array
		 */
		public function create($eventArea)
		{
			
			$sql = "INSERT INTO $this->table (id_type_area, id_calendar, quantity_avaliable, price, remainder) VALUES (:typeArea, :calendar, :quantityAvaliable, :price, :remainder)";
			
			$idTypeArea = $eventArea->getTypeArea()->getIdTypeArea();
			$idCalendar = $eventArea->getCalendar()->getIdCalendar();
			$quantityAvaliable = $eventArea->getQuantityAvaliable();
			$price = $eventArea->getPrice();
			$remainder = $eventArea->getRemainder();
			
			try {
				return $this->pdo->execute($sql, array(
					":typeArea" => $idTypeArea,
					":calendar" => $idCalendar,
					":quantityAvaliable" => $quantityAvaliable,
					":price" => $price,
					":remainder" => $remainder,
				));
			} catch (\PDOException $e) {
				throw $e;
			} catch (\Exception $e) {
				throw $e;
			}
			
		}
		
		/**
		 * @param integer $id
		 * @throws
		 * @return EventArea
		 */
		public function read($id)
		{
			
			$sql = "SELECT * FROM $this->table WHERE id_event_area = :id";
			
			try {
				$result = $this->pdo->execute($sql, array(
					":id" => $id
				));
			} catch (\PDOException $e) {
				echo $e->getMessage();
				die();
			} catch (Exception $e) {
				echo $e->getMessage();
				die();
			}
			
			if ($result) {
				$this->mapMethod($dataSet);
			}
			
		}
		
		public function readAll()
		{
			try {
				$sql = "SELECT * FROM $this->table";
				
				$connection = Connection::connect();
				$statement = $connection->prepare($sql);
				
				$statement->execute();
				
				$dataSet = $statement->fetchAll(\PDO::FETCH_ASSOC);
				
				$this->mapMethod($dataSet);
				
				return $this->list;
			} catch (\PDOException $e) {
				echo $e->getMessage();
				die();
			} catch (Exception $e) {
				echo $e->getMessage();
				die();
			}
		}
	
	public class update($value)
	{
	try
	{
	$sql = "UPDATE $this->table SET id_type_area = :typeArea AND id_calendar = :calendar AND quantity_avaliable = :quantityAvaliable AND price = :price AND remainder = :remainder ";
	
	$connection = Connection::connect();
	$statement = $connection->prepare($sql);
	
	$typeArea = $value->getTypeArea();
	$idTypeArea = $typeArea->getIdTypeArea();
	
	$calendar = $value->getCalendar();
	$idCalendar = $calendar->getIdCalendar();
	
	$quantityAvaliable = $value->getQuantityAvaliable();
	$price = $value->getPrice();
	$remainder = $value->getRemainder();
	
	$statement->execute(array(
	":typeArea" => $idTypeArea,
	":calendar" => $idCalendar,
	":quantityAvaliable" => $quantityAvaliable,
	":price" => $price,
	":remainder" => $remainder,
	));
	
	}
	
	catch
	(\PDOException $e)
    {
	    echo $e->getMessage();
	    die();
    }
    catch(Exception $e)
    {
	    echo $e->getMessage();
	    die();
    }

    public function delete($id)
	{
		try {
			$sql = "DELETE FROM $this->table WHERE id_event_area = $id "; // si es un string poner \" $id \";
			
			$connection = Connection::connect();
			$statement = $connection->prepare($sql);
			
			$statement->execute(array(
				":id" => $id,
			));
			
		} catch (\PDOException $e) {
			echo $e->getMessage();
			die();
		} catch (Exception $e) {
			echo $e->getMessage();
			die();
		}
	}

    public function mapMethod($dataSet)
	{
		$dataSet = is_array($dataSet) ? $dataSet : false;
		
		if ($dataSet) {
			$collection = new Collection();
			
			foreach ($dataSet as $p) {
				$u = new EventArea();
				
				$typeArea = $u->getTypeArea();
				$idTypeArea = $typeArea->getIdTypeArea();
				
				$calendar = $u->getCalendar();
				$idCalendar = $calendar->getIdCalendar();
				
				$u->setTypeArea($idTypeArea)
					->setCalendar($idCalendar)
					->setQuantityAvaliable($p["quantity_avaliable"])
					->setPrice($p["price"])
					->setRemainder($p["remainder"])
					->setIdEventArea($p["id_event_area"]));

          $collection->add($u);

        }
			
			$this->list = $collection;
		}
		
	}

  }
















}
