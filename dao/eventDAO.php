<?php

namespace dao;

use model\Event as Event;
use model\Category as Category;
use interfaces\ICrud as ICrud;
use dao\Singleton as Singleton;
use helpers\Collection as Collection;
use dao\CategoryDAO as CategoryDAO;

class EventDAO extends Singleton implements ICrud
{
	private $connection;
	/*private $list;
	private static $instance;
	private $categoryDao;
	private $pdo;*/

	public function __construct()	{}

		public function create($_data)
		{
			try {

				$sql = "INSERT INTO events (id_category, title) VALUES (:idCategory, :title)";

				$category = new Category($_data->getCategory());

				//$category = $_data->getCategory();
				$idCategory = $category->getIdCategory();

				$parameters['idCategory'] = $idCategory;
				$parameters['title'] = $_data->getTitleEvent();

				// creo la instancia connection
				$this->connection = Connection::getInstance();
				// Ejecuto la sentencia.
				return $this->connection->executeNonQuery($sql, $parameters);
			}
			catch(PDOException $ex)
			{
				throw $ex;
			}
		}

		public function read($id)
		{
			try {

				$sql = "SELECT * FROM events where id_event = :id";

				$parameters['id'] = $id;

				$this->connection = Connection::getInstance();
				$resultSet = $this->connection->execute($sql, $parameters);
			} catch(Exception $ex) {
				throw $ex;
			}

			if(!empty($resultSet))
			return $this->mapMethod($resultSet);
			else
			return false;
		}

		public function readAll()
		{
			try {

				$sql = "SELECT * FROM events";

				$this->connection = Connection::getInstance();
				$resultSet = $this->connection->execute($sql);
			} catch(Exception $ex) {
				throw $ex;
			}

			if(!empty($resultSet))
			return $this->mapMethod($resultSet);
			else
			return false;
		}

		public function update($value)
		{
			$sql = "UPDATE events SET id_category = :idCategory, title = :title WHERE id_event = :id ";

			$category = new Category($_data->getCategory());
			//$category = $value->getCategory();
			$idCategory = $category->getIdCategory();

			$parameters['id'] = $value->getIdEvent();
			$parameters['idCategory'] = $idCategory;
			$parameters['title'] = $value->getTitleEvent();

			try {

				$this->connection = Connection::getInstance();

				return $this->connection->executeNonQuery($sql, $parameters);
			} catch(PDOException $ex) {
				throw $ex;
			}
		}

		public function delete($id)
		{

			try
			{
				$sql = "DELETE FROM events WHERE id_event = :id";
				$parameters['id'] = $id;

				$this->connection = Connection::getInstance();
				return $this->connection->ExecuteNonQuery($sql, $parameters);


			} catch(PDOException $Exception) {

				throw new MyDatabaseException( $Exception->getMessage(), $Exception->getCode());

			}
		}

		public function mapMethod($value) {

			$value = is_array($value) ? $value : [$value];

			$category = new Category($_data->getCategory());
			$category = $value->getCategory();
			$idCategory = $category->getIdCategory();

			$resp = array_map(function($p){
				return new Event($p['id_event'], $p['id_category'], $p['title']);
			}, $value);

			return count($resp) > 1 ? $resp : $resp[0];

		}
	}
