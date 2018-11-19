<?php
namespace controller;

use controller\Controller as Controller;
//use model\File as File;

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

  public function upload ( $fileToUpload = []) {
    //$filePicture = new File();
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

    if ( ! move_uploaded_file( $this->fileToUpload, $uploadImagePath.$this->fileToUpload)){
      $this->errors[] = "No se pudo subir el archivo";
      $isValid=false;
    } 

    //Archivo subido con exito
    return $isValid;
  }

  public function upload2 ( $profilePicture ) {
    

  }
}
