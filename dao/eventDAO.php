<?php

namespace dao;

use model\Event as Event;
use interfaces\ICrud as ICrud;
use dao\Singleton as Singleton;
use helpers\Collection as Collection;
use dao\CategoryDAO as CategoryDAO;

class EventDAO extends Singleton implements ICrud
{
	private $list;
	private static $instance;
	private $categoryDao;
	private $pdo;

	public function __construct()
	{
		$this->table = "events";
		$this->pdo = new Connection();
		$this->list = new Collection();
		$this->categoryDao = CategoryDAO::getInstance();
	}

	public function mapMethodCollection($dataSet)
	{
		$collection = new Collection();
		foreach ($dataSet as $p) {
			$category = $this->categoryDao->read([
				"id_category" => $p['id_category']
			]);
			$category = $this->categoryDao->mapMethod($category);
			$u = new Event(
				$p['id_event'],
				$category,
				$p["title"]
			);
			$collection->add($u);
		}

		return $collection;
	}

	public function mapMethod ($dataSet) {

		$p = $dataSet;

		$category = $this->categoryDao->read([
			"id_category" => $p['id_category']
		]);
		$category = $this->categoryDao->mapMethod($category);

		$u = new Event(
			$p['id_event'],
			//$p["id_category"],
			$category,
			$p["title"]
		);
		return $u;
	}
}
