<?php
    //TODO Manejar mejor bien los errores con este controller y con userController y defaultController
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
        
        function __construct () {
            parent::__construct();
            $this->allowedExtensions = array('image/png', 'image/jpeg', 'image/gif','image/jpg');
            $this->maxSize = 5000000;
        }
    
        /**
         * @param $fileToUpload
         * @return bool
         */
        public function upload ($fileToUpload) {
            //$filePicture = new File();
            $tmpFile = $_FILES[$fileToUpload];
            $isValid = true;
            
            // Si no existe el directorio, lo crea.
            /*if(!file_exists(IMAGE_UPLOADS))
                mkdir(IMAGE_UPLOADS);*/
            
            
            $tmpFile["name"];
            
            if ($this->maxSize < $tmpFile["size"]) {
                $this->errors[] = "Tamaño maximo superado";
                $isValid = false;
            }
            
            if (strlen($tmpFile['name']) > 40) {
                $this->errors[] = "El nombre del archivo es demasiado largo";
                $isValid = false;
            }
            
            if (!in_array($tmpFile['type'], $this->allowedExtensions)) {
                $this->errors[] = "Extension no soportada";
                $isValid = false;
            }
            
            if ( ! move_uploaded_file($tmpFile['tmp_name'], IMAGE_UPLOADS . $tmpFile["name"])) {
                $this->errors[] = "No se pudo subir el archivo";
                $isValid = false;
            }
            
            //Archivo subido con exito
            $this->fileToUpload = $tmpFile["name"];
            return $isValid;
        }
        
        public function hasError () {
            return count($this->errors);
        }
        
        public function getErrors () {
            return $this->errors;
        }
        
        public function getFileToUpload () {
            return $this->fileToUpload;
        }
    }
