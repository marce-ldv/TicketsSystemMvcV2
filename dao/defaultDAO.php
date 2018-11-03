<?php
class DefaultDAO
{
  public $visibleProperty = [];

  public function __construct(){
  }

  public function create ($model) {
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
