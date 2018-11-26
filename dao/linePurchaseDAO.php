<?php

namespace dao;

use model\LinePurchase as Artist;
use interfaces\ICrud as ICrud;
use helpers\Collection as Collection;
use dao\Singleton as Singleton;

class LinePurchaseDAO extends Singleton implements ICrud
{
	private $list = array();
	private static $instance;
	private $pdo;

	public function __construct()
	{
		$this->table = "lines_purchases";
		$this->pdo = new Connection();
	}

  public function mapMethodCollection($dataSet)
  {
  	$collection = new Collection();
  	foreach ($dataSet as $p) {
  		$u = new LinePurchase(
  			$p['id_line_purchase'],
  			$p["id_purchase"],
  			$p["id_event_area"],
  			$p["quantity"],
        $p["price"]
  		);
  		$collection->add($u);
  	}

  	return $collection;
  }

  public function mapMethod ($dataSet) {
    $u = new LinePurchase(
      $p['id_line_purchase'],
      $p["id_purchase"],
      $p["id_event_area"],
      $p["quantity"],
      $p["price"]
  	);
  	return $u;
  }

}
