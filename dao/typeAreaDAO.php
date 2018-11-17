<?php
namespace dao;
/* type_areas(tipo plazas)  */

use model\TypeArea as TypeArea;
use interfaces\ICrud as Icrud;
use helpers\Collection as Collection;

class TypeAreaDAO extends SingletonDAO implements ICrud
{
  private $table = "type_areas";
  private $list = array();
  private static $instance;
  private $pdo;

  public function __construct()
  {
    $this->pdo = new Connection();
  }

  public function create(&$typeArea)
  {
    try
    {
      $sql = "INSERT INTO $this->table (_description) VALUES (:descriptionTypeArea)";

      $connection = Connection::connect();
      $statement = $connection->prepare($sql);

      $descriptionTypeArea = $typeArea->getDescriptionTypeArea();
      print_r($sql);
      $statement->execute(array(
        "descriptionTypeArea" => $descriptionTypeArea
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

  /*TODO: PROBAR READ Y READALL EN LA CONTROLADORA*/

  public function read($id)
  {
    try {

      $sql = "SELECT * FROM $this->table WHERE id_type_area = $id";

      //$pdo = new Connection(); // <- en vez de esta y
      //$connection = $pdo->connect(); // esta linea se puede poner
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

  public function update($value)
  {
    try
    {
      $sql = "UPDATE $this->table SET _description = :descriptionTypeArea WHERE id_type_area = :id ";

      $connection = Connection::connect();
      $statement = $connection->prepare($sql);

      $descriptionTypeArea = $value->getdescriptionTypeArea();
      $id = $value->getIdTypeArea();

      $statement->bindParam(":descriptionTypeArea",$descriptionTypeArea);
      $statement->bindParam(":id",$id);

      $statement->execute();
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
      $sql = "DELETE FROM $this->table WHERE id_type_area = $id "; // si es un string poner \" $id \";

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
    if (is_array($dataSet)) {
      $collection = new Collection();
      foreach ($dataSet as $p) {
        $u = new TypeArea(
          $p['id_type_area'],
          $p["_description"]
        );
        $collection->add($u);
      }
      $this->list = $collection;
    } elseif ($dataSet) {
      $u = new TypeArea(
        $dataSet['id_type_area'],
        $dataSet["_description"]
      );
      $this->list = [$u];
    }
  }
}
