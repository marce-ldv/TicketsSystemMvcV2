<?php
namespace dao\repositories;

use dao\Connection as Connection;
use helpers\Collection as Collection;
use helpers\ConverterCase as ConverterCase;

/**
 *
 */
class DefaultRepository
{

  private $modelMap;
  private $className;
  private $pdo;
  private $tableName;

  public function __construct ($className) {

    $this->className = $className;

    $exploded = explode("\\", $className);
    $tableName = array_pop($exploded);
    $tableName = ConverterCase::toSnakeCase($tableName);
    $tableName = ConverterCase::toPlural($tableName);
    $this->tableName = $tableName;

    $this->pdo = new Connection();
  }

  public function setModelMap ($modelMap) {
    $this->modelMap = $modelMap;
    return $this;
  }

  public function getModelMap () {
    return $this->modelMap;
  }

  public function findOneBy ($column, $value) {
    if ( ! $this->modelMap->hasField($column)) return -1;

    //query
    $sql = "SELECT * FROM $this->tableName WHERE $column = '$value'";

    $connection = $this->pdo->connect();
    $statement = $connection->prepare($sql);

    $statement->execute();

    $result = $statement->fetch(\PDO::FETCH_ASSOC);

    $entity = new $this->className();
    foreach ($this->modelMap->fieldsModel as $fieldModel) {
      $setter = $fieldModel->setter;
      $field = $fieldModel->field;
      $entity->$setter($result[$field]);
    }

    return $entity;
  }

  public function findBy ($column, $value) {
    if ( ! $this->modelMap->hasField($column)) return -1;

    //query
    $sql = "SELECT * FROM $this->tableName WHERE $column = '$value'";
    $connection = $this->pdo->connect();
    $statement = $connection->prepare($sql);

    $statement->execute();

    $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

    $entityCollection = new Collection();

    foreach ($result as $row) {

      $entity = new $this->className;

      foreach ($this->modelMap->fieldsModel as $fieldModel) {
        $setter = $fieldModel->setter;
        $field = $fieldModel->field;
        $entity->$setter($row[$field]);
      }

      $entityCollection[] = $entity;
    }

    return $entityCollection;

  }

  public function __call ($name, $argument) {

  }

}
