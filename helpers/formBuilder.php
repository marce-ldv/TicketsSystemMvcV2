<?php

class FormBuilder
{
  $model;

  public function __construct($model) {
    $this->model = $model;
  }

  public function add($key, $type) {
    $key = ucfirst($key);
  }
}
