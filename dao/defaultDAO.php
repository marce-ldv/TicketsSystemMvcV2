<?php
namespace dao;

use dao\core\ModelMap as ModelMap;
use dao\core\FieldModel as FieldModel;
use helpers\ConverterCase as ConverterCase;
use dao\repositories\DefaultRepository as DefaultRepository;

class DefaultDAO
{



  public function getRepository ($model) {
    $modelMap = $this->getModelMap($model);

    $repository = new DefaultRepository($model);
    $repository->setModelMap($modelMap);

    return $repository;
  }

  private function getModelMap ($model) {

    //get all methods in a array
    $methods = get_class_methods($model);

    //filter setters
    $setters = $this->filterSetters($methods);

    //Get fields from setters
    $fields =$this->getFieldsFromSetter($setters);

    $modelMap = new ModelMap($fields);

    return $modelMap;
  }

  /**
  * Filter a array of methods
  */
  private function filterSetters ($methods) {
    return array_filter($methods, function ($value){
      $getPos = strpos($value, "set");
      if ($getPos === false) return false;
      return true;
    });
  }

  private function filterGetters($methods)
  {
    return array_filter($methods, function ($value){
      $getPos = strpos($value, "get");
      if ($getPos === false) return false;
      return true;
    });
  }

  private function getFieldsFromSetter ($setters) {
    return array_map(function($value) {
      $prop = substr($value, 3);
      $prop = lcfirst($prop);
      $prop = ConverterCase::toSnakeCase($prop);
      return $prop;
    }, $setters);
  }

}
