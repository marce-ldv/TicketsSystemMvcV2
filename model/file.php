<?php namespace model;

use \JsonSerializable as JsonSerializable;

class File implements JsonSerializable{
     private $id,$name,$value,$temp,$size;

     function __construct($id = '', $key = '', $val = '', $tmp = '', $size = ''){
          $this->id = $id;
          $this->name = $key;
          $this->value = $val;
          $this->temp = $tmp;
          $this->size = $size;
     }

     public function getID() {
          return $this->id;
     }
     public function getValue() {
          return $this->value;
     }
     public function getName() {
          return $this->name;
     }
     public function getTempName() {
          return $this->temp;
     }
     public function getSize() {
          return $this->size;
     }

     public function jsonSerialize() {
          return [
               'id' => $this->id,
               'name' => $this->name,
               'value' => $this->value,
               'temp' => $this->temp,
               'size' => $this->size
          ];
     }

}
