<?php

namespace dao;

use model\Artist as Artist;
use interfaces\ICrud as ICrud;
use helpers\Collection as Collection;
use dao\Singleton as Singleton;

class ArtistDAO extends Singleton implements ICrud
{
	private $list = array();
	private static $instance;
	private $pdo;

	public function __construct()
	{
		$this->table = "artists";
		$this->pdo = new Connection();
	}

public function mapMethodCollection($dataSet)
{
	$collection = new Collection();
	foreach ($dataSet as $p) {
		$u = new Artist(
			$p['id_artist'],
			$p["nickname"],
			$p["name_artist"],
			$p["surname"]
		);
		$collection->add($u);
	}

	return $collection;
}

public function mapMethod ($p) {
	$u = new Artist(
		$p['id_artist'],
		$p["nickname"],
		$p["name_artist"],
		$p["surname"]
	);
	return $u;
}

}
