<?php namespace dao;

use dao\Connection as Connection;
use dao\Singleton as Singleton;
use model\User as User;
use interfaces\ICrud as ICrud;

class UserDAO extends Singleton implements ICrud{
	protected $table = "users"; /* se agregar para el dia de mañana modificar una vez el nombre de la tabla */
	private $objInstances = []; //aca van los objetos instanciados desde la base de datos
	private static $instance;
	private $pdo;

	//object factoryDao

	public function __construct(){
		$this->pdo = new Connection();
	}


public function readByUsernameOrEmail ($userOrEmail) {
	try{
		$query = "SELECT * FROM $this->table WHERE username = :user OR email = :email";

		$connection = $this->pdo->connect();
		$statement = $connection->prepare($query);

		$statement->execute([
			":user" => $userOrEmail["user"],
			":email" => $userOrEmail["email"]
		]);

		if ($statement->rowCount() > 0) {
			return true;
		}

		return false;

	}catch(\PDOException $e){
		echo $e->getMessage();
		die();
	}catch(Exception $e){
		echo $e->getMessage();
		die();
	}
}

public function readByUser($data){
	try{
		$sql = "SELECT * FROM $this->table WHERE username = :userParam OR email = :userEmail";

		$connection = $this->pdo->connect();
		$statement = $connection->prepare($sql);

		$statement->execute(array(
			":userParam" => $data,
			":userEmail" => $data
		));

		if ($statement->rowCount() == 0) {
			return false;
		}

		//TODO: Terminar la implementacion
		$user = $statement->fetch(\PDO::FETCH_ASSOC);

		return $user;
	}catch(\PDOException $e){
		echo $e->getMessage();
	}
}

public function mapMethodCollection($dataSet)
{
	$collection = new Collection();
	foreach ($dataSet as $p) {
		$u = new User(
			$p['id_user'],
			$p["username"],
			$p["pass"],
			$p["email"],
			$p["name_user"],
			$p["surname"],
			$p["dni"],
			$p["profile_picture"]
		);
		$collection->add($u);
	}
	return $collection;
}

public function mapMethod ($dataSet) {
	$p = $dataSet;
	$u = new User(
		$p['id_user'],
		$p["username"],
		$p["pass"],
		$p["email"],
		$p["name_user"],
		$p["surname"],
		$p["dni"],
		$p["profile_picture"]
	);
	return $u;
}


}//class end
