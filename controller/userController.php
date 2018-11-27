<?php
    
    namespace controller;
    
    use model\User as User;
    use controller\FileController as FileController;
    use controller\Controller as Controller;
    use dao\UserDAO as UserDAO;
    
    class UserController extends Controller
    {
        private $userDAO;
        
        public function __construct () {
            parent::__construct();
            $this->userDAO = new UserDAO();
        }
        
        public function index () {
            return;
        }
        
        /**
         * @param User $user
         * @return bool
         * @throws \Exception
         */
        public function add (User $user) {
            
            if (!$this->isMethod("POST")) $this->redirect("/default/");
            
            $fileController = new FileController();
            
            if ($fileController->upload("profilePicture")) {
                
                $user->setProfilePicture($fileController->getFileToUpload());
                try {
                    $this->userDAO->create($user);
                    return true;
                } catch (\Exception $e) {
                    throw $e;
                }
            }
            
            
            return false;
        }
        
        /**
         * @param array $registerData
         *
         * Validamos al usuario y si el usuario existe y la pass coincide
         * entonces
         */
        public function login ($registerData = []) {
            if (!$this->isMethod("POST")) $this->redirect("/default/");
            if (empty($registerData)) $this->redirect("/default/");
            
            $user = $this->userDAO->read($registerData['username']);
            
            if ($user) {
                if (password_verify($registerData['pass'], $user->getPass())) {
                    $this->session->token = $user->serialize();
                    //return $user;
                }
            }
            
            $this->redirect("/default");
        }
        
        public function logout () {
            $this->session->destroy();
            $this->redirect('/');
        }
        
        
    }
