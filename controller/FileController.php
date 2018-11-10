<?php
namespace controller;

use controller\Controller as Controller;

class FileController extends Controller
{
  public $maxSize = 5000000;
  public $allowedExtensions = ["jpg", "png", "gif"];
  public $dimensions = ["150", "150"];
  public $uploadImagePath = IMAGE_UPLOADS;
  public $errors = [];
  private $fileToUpload;

  public function isValid ( $fileToUpload ) {
    $tmpFile = $_FILES[$fileToUpload];
    $isValid = true;

    $this->fileToUpload = $fileToUpload;


    if( $this->maxSize < $tmpFile["size"] ) {
      $this->errors[] = "Tamaño maximo superado";
      $isValid = false;
    }

    if( strlen($tmpFile['name'] > 40) ) {
      $this->errors[] = "El nombre del archivo es demasiado largo";
      $isValid = false;
    }

    if( ! in_array($tmpFile['type'], $this->allowedExtensions ) ) {
      $this->errors[] = "Extension no soportada";
      $isValid = false;
    }
  }
}
