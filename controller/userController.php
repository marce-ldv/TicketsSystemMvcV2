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

      if( ! $this->userDao->readByUser($user) ){
        $this->redirect('/default/index');
      }



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
      ->setDni($registerData["dni"])
      ->setProfilePicture($registerData["profilePicture"]);

    $repository->create($user);

    $this->redirect ('/default/', ["alert" => "Usuario creado con exito"]);
  }

  //login

  public function login($registerData = []){
    if ( ! $this->isMethod("POST")) $this->redirect("/default/");
    if (empty($registerData)) $this->redirect("/default/");

    /*$repository = $this->defaultDAO->getRepository(User::class);

    $user = $repository->findOneBy([
      'username' => $registerData['username'],
      'email' => $registerData['username'],
    ],"OR");*/
    $user = new User();
    $user->setUsername($registerData["username"]);

    if( ! $this->userDAO->readByUsername($user) ) $this->redirect('/default/',[
      'alert' => "Usuario no encontrado"
    ]);

    $hash = password_hash($registerData["pass"],PASSWORD_DEFAULT);
    print_r($_SESSION);
    if( ! password_verify($hash,$user->getPass()) )  $this->redirect('/home/',[
      'alert' => "Password no coincide"
    ]);

    $this->session->token = $user->serialize();

    $this->redirect('/default/dashboard/');

  }

  public function logout()
  {
    $this->session->destroy();
    $this->redirect('/');
  }

  public function sendMessage($formData){

  }

}
