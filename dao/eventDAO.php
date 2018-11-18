<?php

namespace dao;

use model\Event as Event;
use interfaces\ICrud as ICrud;
use dao\Singleton as Singleton;
use helpers\Collection as Collection;
use dao\CategoryDAO as CategoryDAO;

class EventDAO extends Singleton implements ICrud
{
	private $table = "events";
	private $list;
	private static $instance;
	private $categoryDao;
	private $pdo;

	public function __construct()
	{
		$this->pdo = new Connection();
		$this->list = new Collection();
		$this->categoryDao = CategoryDAO::getInstance();
	}

	public function mapMethodCollection($dataSet)
	{
		$collection = new Collection();
		foreach ($dataSet as $p) {
			$category = $this->categoryDao->read($p['id_category']);
			$category = $this->mapMethod($category);
			$u = new Event(
				$p['id_event'],
				//$p["id_category"],
				$category,
				$p["title"]
			);
			$collection->add($u);
		}

		return $collection;
	}
	/*id_event BIGINT UNSIGNED AUTO_INCREMENT,
	id_category BIGINT UNSIGNED,
	title VARCHAR(50) NOT NULL,*/

	public function mapMethod ($dataSet) {

		$p = $dataSet;

		$category = $this->categoryDao->read($p['id_category']);
		$category = $this->mapMethod($category);

		$u = new Event(
			$p['id_event'],
			//$p["id_category"],
			$category,
			$p["title"]
		);
		return $u;
	}
}
