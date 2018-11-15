<?php

namespace controller;
use model\User as User;
use controller\FileCcontroller as FileController;
use controller\Controller as Controller;
use dao\UserDAO as UserDAO;

class UserController extends Controller{
  private $userDAO;

  public function __construct () {
    parent::__construct();
    $this->userDAO = new UserDAO();
  }

  public function index(){
    $this->indexView();
  }

  public function register ($registerData = []) {

    if ( ! $this->isMethod("POST")) $this->redirect("/default/");
    if (empty($registerData)) $this->redirect("/default/");

    $user = new User();
    $repository = $this->defaultDAO->getRepository(User::class);
    $criteria = [
      "username" => $registerData["username"],
      "email" => $registerData["email"]
    ];

    if ($repository->findOneBy($criteria, "OR")) {
       $this->redirect("/default/", ["alert" => "El usuario o email ya estan registrados"]);
     }

    if ($registerData["pass"] != $registerData["passAgain"]) {
      $this->redirect("/default/", ["alert" => "Las contraseñas no coinciden"]);
     }

    $hash = password_hash($registerData["pass"],PASSWORD_DEFAULT);

    $user->setUsername($registerData["username"])
      ->setPass($hash)
      ->setEmail($registerData["email"])
      ->setNameUser($registerData["name_user"])
      ->setSurname($registerData["surname"])
      ->setDni($registerData["dni"]);
      //->setProfilePicture($registerData["profilePicture"]);

    $repository->create($user);

    $this->redirect ('/default/', ["alert" => "Usuario creado con exito"]);
  }

  //login
  
  public function login($registerData = []){
    if ( ! $this->isMethod("POST")) $this->redirect("/default/");
    if (empty($registerData)) $this->redirect("/default/");
    
    $user = new User();
    $user->setUsername($registerData["username"]);
    $user->setEmail($registerData["username"]);    

    if( ! $this->userDAO->readByUser($user) ) {
        $this->redirect('/default/',[
        'queMierdaPasa' => "PAsa algo en readByUser"
      ]);
      return;
      }

    if( ! password_verify($registerData["pass"],$user->getPass()) ){
      $this->redirect('/default/',[
        'alert' => "Password incorrecta"
      ]);
      return ;  
    }  

    $this->session->token = $user->serialize();

    $this->redirect('/default/dashboard/');
    return ;
  }

//funca asi?

  public function logout()
  {
    $this->session->destroy();
    $this->redirect('/');
  }


}
