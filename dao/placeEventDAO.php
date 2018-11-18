<?php

namespace dao;

use model\PlaceEvent as PlaceEvent;
use interfaces\ICrud as ICrud;
use helpers\Collection as Collection;
use dao\Singleton as Singleton;

class PlaceEventDAO extends Singleton implements ICrud
{
  private $list = array();
  private static $instance;
  private $pdo;

  public function __construct()
  {
    $this->table = "place_events";
    $this->pdo = new Connection();
  }

  public function mapMethodCollection($dataSet)
  {
  	$collection = new Collection();
  	foreach ($dataSet as $p) {
  		$u = new PlaceEvent(
  			$p['id_place_event'],
  			$p["capacity"],
  			$p["_description"]
  		);
  		$collection->add($u);
  	}

  	return $collection;
  }

  public function mapMethod ($p) {
    $u = new PlaceEvent(
      $p['id_place_event'],
      $p["capacity"],
      $p["_description"]
    );
  	return $u;
  }
}
