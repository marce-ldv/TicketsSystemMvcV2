<?php
namespace dao\core;

use dao\core\FieldModel as FieldModel;
use helpers\ConverterCase as ConverterCase;

/**
 *
 */
class ModelMap
{
  public $fieldsModel = [];

  function __construct($fields)
  {
    foreach ($fields as $field) {
      $fieldModel = new FieldModel();
      $fieldModel->field = $field;
      $fieldModel->setter = $this->fieldToSetter($field);
      $fieldModel->getter = $this->fieldToGetter($field);
      $this->fieldsModel[] = $fieldModel;
    }
  }

  private function fieldToSetter ($field) {
    return  "set".ConverterCase::toCamelCaseUpper($field);
  }

  private function fieldToGetter ($field) {
    return "get".ConverterCase::toCamelCaseUpper($field);
  }

  public function hasField ($field) {
    $has = false;
    foreach ($this->fieldsModel as $fieldModel) {
      if ($fieldModel->field == $field) $has = true;
    }
    return $has;
  }

}
