<?php namespace config;

     class Request {

          private $controller;
          private $method;
          private $parameters;

          public function __construct() {

               /**
               * Obtengo la url en formato de string
               */
               $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);

               /**
                * La descompongo en un array
                */
               $urlToArray = explode("/", $url);

               /**
                * Elimino espacios vacios en el caso que los haya
                */
               $ArregloUrl = array_filter($urlToArray);

                /**
                 * Si el array tiene elementos, el primero lo guardamos en controller, si no, guardamos Home como controller por defecto
                 */
                if(empty($ArregloUrl)) {
                     $this->controller = 'default';
                } else {
                     $this->controller = ucwords(array_shift($ArregloUrl));
                }

               /**
               * Si el array tiene elementos, el primero lo guardamos en method, si no, guardamos index como method por defecto
               */
               if(empty($ArregloUrl)) {
                    $this->method = 'index';
               } else {
                    $this->method = array_shift($ArregloUrl);
               }

               /**
               * Si la petición es GET y el array aún tiene datos, se guardan en parameters, si no, se guardan lo que viene como $_POST
               */
               $requestMethod = $this->getMetodoRequest();

               if($requestMethod == 'GET') {
                    if(!empty($ArregloUrl)) {
                         $this->parameters = $ArregloUrl;
                    }
               } else {
                    $this->parameters = $_POST;
               }
          }

          /**
          * Devuelve el método HTTP
          * con el que se hizo el
          * Request
          *
          * @return String
          */
          public static function getMetodoRequest()
          {
               return $_SERVER['REQUEST_METHOD'];
          }

          /**
          * Devuelve el controlador
          *
          * @return String
          */
          public function getController() {
               return $this->controller;
          }

          /**
          * Devuelve el método
          *
          * @return String
          */
          public function getMethod() {
               return $this->method;
          }

          /**
          * Devuelve los atributos
          *
          * @return Array
          */
          public function getParameters() {
               return $this->parameters;
          }
     }
