<?php
namespace dao;

use dao\Connection as Connection;

class DefaultDAO
{
  $visibleProperty = [];

  public function __construct(){
    $this->pdo = new Connection();
  }
// TODO: No pasar el nombre de la tabla
  public function create ($table, $model) {

    $atributes = $this->getAttrString($model);

    $sql = "INSERT INTO $table $atributes VALUES "

  }

  private function getAttrString ($model) {
    $attrArray = $this->getAttrArray($model);
    $buff = "(";
    foreach ($attrArray as $value) {
      $buff .= $value.",";
    }
    $buff = substr($buff, 0, -1);
    $buff .= ")";
  }

  private function getAttrArray ($model) {
    //get all methods in a array
    $methods = get_class_methods($model);

    //remove the gettters
    $visibleProperty = array_filter($methods, function ($value){
      $getPos = strpos($value, "set");
      if ($getPos === false) return false;
      return true;
    });

    //remove set and convert
    $db_Attr = array_map(function($value) {
      $prop = substr($value, 3);
      $prop = lcfirst($prop);
      $prop = $this->toAttr($prop);
      return $prop;
    }, $visibleProperty);

    return $db_Attr;
  }

  private function toAttr ($string) {
    $arrString = str_split($string);
    $buff = "";
    foreach ($arrString as $value) {
      if (preg_match("/[A-Z]/",$value)) {
        $buff .= "_".lcfirst($value);
      } else {
        $buff .=$value;
      }
    }

    return $buff;
  }
}
