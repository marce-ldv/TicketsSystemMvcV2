<?php

namespace dao;

use model\Category as Category;
use interfaces\ICrud as ICrud;
use helpers\Collection as Collection;
use dao\Singleton as Singleton;

class CategoryDAO extends Singleton implements ICrud
{
	private $list = array();
	private static $instance;
	private $pdo;

	public function __construct()
	{
		$this->table = "categories";
		$this->pdo = new Connection();
	}

public function mapMethodCollection($dataSet)
{
	$collection = new Collection();
	foreach ($dataSet as $p) {
		$u = new Category(
			$p['id_category'],
			$p["name_category"]
		);
		$collection->add($u);
	}
	return $collection;
}

public function mapMethod ($dataSet) {
	$u = new Category(
		$dataSet['id_category'],
		$dataSet["name_category"]
	);
	return $u;
}

}
