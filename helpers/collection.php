<?php
namespace helpers;

class Collection implements \Iterator, \Countable, \ArrayAccess
{
  private $position = 0;
  private $array = [];
  
  public static function createFromArray (Array $array) {
      $collection = new Collection();
      $collection->setArray($array);
      return $collection;
  }
  
  public function setArray (Array $array) {
      $this->array = $array;
  }

  public function current () {
    return $this->array[$this->position];
  }

  public function key () {
    return $this->position;
  }

  public function next () {
    ++$this->position;
  }

  public function rewind () {
    $this->position = 0;
  }

  public function valid () {
    return isset($this->array[$this->position]);
  }

  public function contains ($element) {
    return in_array($element, $this->array, true);
  }

  public function add ($element) {
    $this->array[] = $element;
  }

  public function remove ($key) {
    if ( ! isset($this->array[$key]) && ! array_key_exists($key, $this->array)) {
            return null;
          }
    $removed = $this->elements[$key];
    unset($this->array[$key]);
    return $removed;
  }

  public function count () {
    return count($this->array);
  }

  public function offsetSet($offset, $valor) {
      if (is_null($offset)) {
          $this->array[] = $valor;
      } else {
          $this->array[$offset] = $valor;
      }
  }

  public function offsetExists($offset) {
      return isset($this->array[$offset]);
  }

  public function offsetUnset($offset) {
      unset($this->array[$offset]);
  }

  public function offsetGet($offset) {
      return isset($this->array[$offset]) ? $this->array[$offset] : null;
  }
}
