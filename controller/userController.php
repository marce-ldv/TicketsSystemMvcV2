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
    return;
  }


  public function register ($registerData = []) {

    if ( ! $this->isMethod("POST")) $this->redirect("/default/");
    if (empty($registerData)) $this->redirect("/default/");

    //$fileController = new FileController(); 

    if ($this->userDAO->readByUsernameOrEmail([
      "user" => $registerData["username"],
      "email" => $registerData["email"]
      ])) {
       $this->redirect("/default/", ["alert" => "El usuario o email ya estan registrados"]);
       return;
     }

    if ($registerData["pass"] != $registerData["passAgain"]) {
      $this->redirect("/default/", ["alert" => "Las contraseñas no coinciden"]);
      return;
     }

    $hash = password_hash($registerData["pass"],PASSWORD_DEFAULT);

    $data["username"] = $registerData["username"];
    $data["pass"] = $hash;
    $data["email"] = $registerData["email"];
    $data["name_user"] = $registerData["name_user"];
    $data["surname"] = $registerData["surname"];
    $data["dni"] = $registerData["dni"];
    //$data["profilePicture"] = $registerData["profilePicture"];

    //  $fileController->upload($registerData["profilePicture"]);

    $this->userDAO->create($data);

    $this->redirect ('/default/', ["alert" => "Usuario creado con exito"]);
    return;
  }

  //login

  public function login($registerData = []){
    if ( ! $this->isMethod("POST")) $this->redirect("/default/");
    if (empty($registerData)) $this->redirect("/default/");

    if( ! $user = $this->userDAO->readByUser($registerData["username"]) ) {
        $this->redirect('/default/',[
        'queMierdaPasa' => "PAsa algo en readByUser"
      ]);
      return;
      }
$user = $this->userDAO->mapMethod($user);
    if( ! password_verify($registerData["pass"],$user->getPass()) ){
      $this->redirect('/default/',[
        'alert' => "Password incorrecta"
      ]);
      return ;
    }

    $this->session->token = $user->serialize();

    $this->redirect('/default/dashboard/');

  }

  public function logout()
  {
    $this->session->destroy();
    $this->redirect('/');
  }


}
