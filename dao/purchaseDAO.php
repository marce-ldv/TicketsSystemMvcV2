<?php namespace dao;

use dao\Connection as Connection;
use dao\SingletonDAO as Singleton;
use dao\UserDAO as UserDAO;
use model\User as User;
use model\Purchase as Purchase;
use interfaces\ICrud as ICrud;

class PurchaseDAO extends Singleton implements ICrud{
  protected $table = "purchases"; /* se agregar para el dia de mañana modificar una vez el nombre de la tabla */
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
public function create(&$purchase) {

  try {

    $sql = ("INSERT INTO $this->table (id_user, date_purchase) VALUES (:id_user, :date_purchase)");
    $connection = $this->pdo->connect();
    $statement = $connection->prepare($sql);

    $userId = $purchase->getUser()->getIdUser();
    $datePurchase = date('Y-m-d');

    $statement->bindParam(":id_user", $userId);
    $statement->bindParam(":date_purchase", $datePurchase);

    $statement->execute();

    //print_r($statement->errorInfo());

    return $connection->lastInsertId();

  }catch(\PDOException $e){
    echo $e->getMessage();
    die();
  }catch(Exception $e){
    echo $e->getMessage();
    die();
  }
}

public function read($id) {}

// TODO: Implementar bien este metodo, debe traer un solo usuario
public function readById(Purchase &$purchase){
  try{
    $query = "SELECT * FROM $this->table WHERE id_purchase = :id_purchase";

    $pdo = new Connection();
    $connection = $pdo->connect();
    $statement = $connection->prepare($query);

    $statement->execute(array(
      ":id_purchase" => $entity->getId()
    ));

    if ($statement->rowCount() == 0) {
      return false;
    }

    $purchaseArray = $statement->fetch(\PDO::FETCH_ASSOC);

    //Buscar user
    $userDAO = UserDAO::getInstance();
    $user = new User();
    $user->setId($purchaseArray["id_user"]);
    $userDAO->readById($user);

    $pruchase->setId($purchaseArray["id_purchase"]);
    $purchase->setUser($user);

    return true;

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
/*
public function readByUser($username){
try{
$sql = "SELECT * FROM $this->table WHERE username = :userParam OR email = :userParam";
$connection = $this->pdo->connect();
$statement = $connection->prepare($sql);
$statement->bindParam(':userParam', $username);
$statement->execute();

if ($statement->fetch()){

return TRUE;
}
return FALSE;
}catch(\PDOException $e){
echo $e->getMessage();
}
}
*/
public function readByUser($username){
  try{
    $sql = "SELECT * FROM $this->table WHERE username = :userParam OR email = :userParam";
    $connection = $this->pdo->connect();
    $statement = $connection->prepare($sql);
    $statement->bindParam(':userParam', $username);
    $statement->execute();


    $var = $statement->fetch();
    print_r($var);
    if(empty($var)){
      return false;
    }

    $modelUser = new User(
      $var['username'],
      $var['pass'],
      $var['email'],
      $var['name_user'],
      $var['surname'],
      $var['dni']
    );

    return $modelUser;
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
