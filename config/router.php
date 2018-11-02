<?php namespace config;

    class Router {

        /**
         * Se encarga de direccionar a la pagina solicitada
         *
         * @param Request
         */

        public function __construct()
        {
            # code...
        }

        public static function go(Request $request) {

            /**
             *
             */
            $controller = $request->getController() . 'Controller';

            /**
             *
             */
            $method = $request->getMethod();

            /**
             *
             */
            $parameters = $request->getParameters();

            /**
             *
             */
            $class = "controller\\". $controller;

            /**
             *
             */
            $instance = new $class;


            /**
             *
             */
            if($_FILES) {
                 $parameters[] = $_FILES;
            }


            /**
             *
             */
            if(!isset($parameters)) {
                call_user_func(array($instance, $method));
            } else {
                call_user_func_array(array($instance, $method), $parameters);
            }
        }
    }

?>
