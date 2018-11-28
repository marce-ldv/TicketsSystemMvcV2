<?php
    
    namespace controller;
    
    use controller\Controller as Controller;
    use model\User as User;
    
    class DefaultController extends Controller
    {
        
        private $userController;
        
        /**
         * DefaultController constructor.
         */
        public function __construct () {
            parent::__construct();
            $this->userController = new UserController();
        }
        
        /**
         *
         */
        public function index () {
            $this->render('home');
        }
        
        /**
         *
         */
        public function dashboard () {
            $this->render('dashboard');
        }
        
        /**
         * @param array $registerData
         *
         */
        public function addUser ($registerData = []) {
            if ($registerData["pass"] != $registerData["passAgain"]) {
                $this->render('home', [
                    'message' => "contraseñas no coinciden"
                ]);
                return;
            }
            
            $hash = password_hash($registerData["pass"], PASSWORD_DEFAULT);
            
            $user = new User(
                '',
                $registerData['username'],
                $hash,
                $registerData['email'],
                $registerData['name_user'],
                $registerData['surname'],
                $registerData['dni'],
                ''
            );
            
            try {
                if ($result = $this->userController->add($user)) {
                    $success = 'Usuario creado con exito..';
                } else {
                    $alert = 'Opps al parecer hubo un problema..';
                }
            } catch (\Exception $e) {
                throw $e;
            }
            /**
             *
             */
            $this->render('home', [
                //Operador de Fusión de null de php 7
                //Equivalente a:
                //$nombre_usuario = isset($_GET['usuario']) ? $_GET['usuario'] : 'nadie';
                'message' => $success ?? $alert
            ]);
            
        }
        
    }
