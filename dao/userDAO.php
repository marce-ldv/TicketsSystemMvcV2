<?php namespace dao;

use dao\Connection as Connection;
use dao\SingletonDAO as Singleton;
use model\User as User;
use interfaces\ICrud as ICrud;

class UserDAO extends Singleton implements ICrud{
	protected $table = "users"; /* se agregar para el dia de mañana modificar una vez el nombre de la tabla */
	private $objInstances = []; //aca van los objetos instanciados desde la base de datos
	private static $instance;
	private $pdo;

	public function __construct(){
		$this->pdo = new Connection();
	}
	/*
	public static function getInstance()
	{
	if (!self::$instance instanceof self) {
	self::$instance = new self();
}
return self::$instance;
}
*/
public function create(&$user) {

	try {
		$sql = ("INSERT INTO $this->table (username, pass, email,name_user,surname,dni)
		VALUES (:username, :pass, :email, :name_user, :surname, :dni)");
		$connection = $this->pdo->connect();
		$statement = $connection->prepare($sql);

		$username = $user->getUsername();
		$pass = $user->getPass();
		$email = $user->getEmail();
		$name_user = $user->getNameUser();
		$surname = $user->getSurname();
		$dni = $user->getDni();
		//$role = $user->getRole();

		//$statement->bindParam(':role_user', $role);
		$statement->bindParam(':username', $username);
		$statement->bindParam(':pass', $pass);
		$statement->bindParam(':email', $email);
		$statement->bindParam(':name_user', $name_user);
		$statement->bindParam(':surname', $surname);
		$statement->bindParam(':dni', $dni);

		$statement->execute();

		return $connection->lastInsertId();
	}catch(\PDOException $e){
		echo $e->getMessage();
		die();
	}catch(Exception $e){
		echo $e->getMessage();
		die();
	}
}
// TODO: Implementar bien este metodo, debe traer un solo usuario
public function read($id){
	try{
		$query = "SELECT * FROM $this->table";

		$pdo = new Connection();
		$connection = $pdo->connect();
		$statement = $connection->prepare($query);

		$statement->execute();

	}catch(\PDOException $e){
		echo $e->getMessage();
		die();
	}catch(Exception $e){
		echo $e->getMessage();
		die();
	}
}

public function readAll(){

	try{
		$query = "SELECT * FROM $this->table";

		$pdo = new Connection();
		$connection = $pdo->connect();
		$statement = $connection->prepare($query);

		$statement->execute();

		$dataSet = $statement->fetchAll(\PDO::FETCH_ASSOC);

		$this->mapMethod($dataSet);

		if (!empty($this->objInstances)) {
			return $this->objInstances;
		}

		return null;
	}catch(\PDOException $e){
		echo $e->getMessage();
		die();
	}catch(Exception $e){
		echo $e->getMessage();
		die();
	}
}//end fetch method

public function update($value){
	// code...
}

public function delete($id){
	// code...
}

public function readById (User &$user) {
	try{
		$query = "SELECT * FROM $this->table WHERE id_user = :id_user";

		$pdo = new Connection();
		$connection = $pdo->connect();
		$statement = $connection->prepare($query);

		$statement->execute(array(
			":id_user" => $user->getIdUser()
		));

		if ($statement->rowCount() == 0) {
			return false;
		}

		//TODO: Terminar la implementacion
		$userArray = $statement->fetch(\PDO::FETCH_ASSOC);
		$user->setUsername($userArray["username"]);
		$user->setEmail($userArray["email"]);
		$user->setRole($userArray["role_user"]);

		return true;

	}catch(\PDOException $e){
		echo $e->getMessage();
		die();
	}catch(Exception $e){
		echo $e->getMessage();
		die();
	}
}

public function readByUsername (&$user) {
	try{
		$sql = "SELECT * FROM $this->table WHERE username = :userParam";
		$connection = $this->pdo->connect();
		$statement = $connection->prepare($sql);

		$statement->execute(array(
			":userParam" => $user->getUsername()
		));

		if ($statement->rowCount() == 0) {
			return false;
		}

		//TODO: Terminar la implementacion
		$userArray = $statement->fetch(\PDO::FETCH_ASSOC);
		$user->setIdUser($userArray["id_user"]);
		$user->setUsername($userArray["username"]);
		$user->setEmail($userArray["email"]);
		$user->setRole($userArray["role_user"]);

		return true;

	}catch(\PDOException $e){
		echo $e->getMessage();
		die();
	}catch(Exception $e){
		echo $e->getMessage();
		die();
	}
}

public function readByUser(&$user){
	try{
		$sql = "SELECT * FROM $this->table WHERE username = :userParam OR email = :userEmail";

		$connection = $this->pdo->connect();
		$statement = $connection->prepare($sql);

		$username = $user->getUsername();
		$email = $user->getEmail();

		$statement->execute(array(
			":userParam" => $username,
			":userEmail" => $email
		));

		if ($statement->rowCount() == 0) {
			return false;
		}

		//TODO: Terminar la implementacion
		$userArray = $statement->fetch(\PDO::FETCH_ASSOC);
		$user->setIdUser($userArray["id_user"]);
		$user->setUsername($userArray["username"]);
		$user->setEmail($userArray["email"]);
<<<<<<< HEAD
		//$user->setRole($userArray["role_user"]);
=======
		$user->setRoleUser($userArray["role_user"]);
>>>>>>> b150d9e70ccf3b5bd57cd0d30bb05fc855bd3bec
		$user->setPass($userArray["pass"]);

		return true;
	}catch(\PDOException $e){
		echo $e->getMessage();
	}
}

public function mapMethod($dataSet){

	$dataSet = is_array($dataSet) ? $dataSet : false;

	if($dataSet){
		$this->listado = array_map(function ($p) {
			$u = new Usuario(
				$p['username'],
				$p['pass'],
				$p['email']);
				$u->setId($p['id_usuario']);
				return $u;
			}, $dataSet);
		}
	}//mapMethod end



}//class end
?>
