<?php

namespace dao;

use model\Artist as Artist;
use interfaces\ICrud as ICrud;
use helpers\Collection as Collection;

class ArtistDAO extends Singleton implements ICrud
{
	private $connection;
/*private $list = array();
	private static $instance;
	private $pdo;*/

	public function __construct()	{}

		public function create($_data)
	  {
	    try {

				$sql = "INSERT INTO artists (nickname, name_artist, surname) VALUES (:nickname, :nameArtist, :surname)";

	      $parameters['nickname'] = $_data->getNickname();
	      $parameters['nameArtist'] = $_data->getNameArtist();
	      $parameters['surname'] = $_data->getSurname();

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

	       $sql = "SELECT * FROM artists where id_artist = :id";

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

	       $sql = "SELECT * FROM artists";

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
	        $sql = "UPDATE artists SET nickname = :nickname, name_artist = :name_artist, surname = :surname WHERE id_artist = :id ";

	        $parameters['id'] = $value->getIdArtist();
	        $parameters['nickname'] = $value->getNickname();
	        $parameters['surname'] = $value->getSurname();
					$parameters['name_artist'] = $value->getNameArtist();
					
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
	     $sql = "DELETE FROM artists WHERE id_artist = :id";
	     $parameters['id'] = $id;

	          $this->connection = Connection::getInstance();
	      		return $this->connection->ExecuteNonQuery($sql, $parameters);


	       } catch(PDOException $Exception) {

			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ));

			}
	  }

	  public function mapMethod($value) {

//		print_r($value);

		$value = is_array($value) ? $value : [$value];



		$resp = array_map(function($p){
			return new Artist($p['id_artist'], $p['nickname'], $p['name_artist'], $p['surname']);
		}, $value);

	           return count($resp) > 1 ? $resp : $resp[0];

		}

}
