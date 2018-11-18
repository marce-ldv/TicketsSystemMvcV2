<?php
namespace dao;
/* type_areas(tipo plazas)  */

use model\TypeArea as TypeArea;
use interfaces\ICrud as ICrud;
use helpers\Collection as Collection;
use dao\Singleton as Singleton;

class TypeAreaDAO extends Singleton implements ICrud
{
  private $list = array();
  private static $instance;
  private $pdo;

  public function __construct()
  {
    $this->table = "type_areas";
    $this->pdo = new Connection();
  }

  public function mapMethodCollection($dataSet)
  {
    $collection = new Collection();
    foreach ($dataSet as $p) {
      $u = new TypeArea(
        $p['id_type_area'],
        $p["_description"]
      );
      $collection->add($u);
    }

    return $collection;
  }

  public function mapMethod ($dataSet) {
    $u = new TypeArea(
      $dataSet['id_type_area'],
      $dataSet["_description"]
    );
    return $u;
  }
}
