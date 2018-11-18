<?php
namespace controller;

use controller\Controller as Controller;
use model\File as File;

class FileController extends Controller
{
  private $maxSize = 5000000;
  private $allowedExtensions;
  private $dimensions = ["150", "150"];
  private $uploadImagePath;
  private $errors = [];
  private $fileToUpload;

  function __construct() {
    $this->allowedExtensions = array('png', 'jpg', 'gif');
    $this->maxSize = 5000000;
    $this->uploadFilePath = IMAGE_UPLOADS;
}

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

    if (move_uploaded_file( $fileToUpload->getTempName(), $uploadImagePath)){
      return true;
    }

    return false;
  }
}
