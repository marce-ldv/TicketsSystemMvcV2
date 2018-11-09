<?php

namespace controller;
use model\User as User;
use controller\Controller as Controller;

class UserController extends Controller{

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
      ->setName($registerData["name"])
      ->setSurname($registerData["surname"])
      ->setDni($registerData["dni"])
      ->setAvatar($registerData["avatar"]);

    $repository->create($user);

    $this->redirect ('/default/', ["alert" => "Usuario creado con exito"]);
  }

  //login

  public function login($registerData = []){
    if ( ! $this->isMethod("POST")) $this->redirect("/default/");
    if (empty($registerData)) $this->redirect("/default/");

    $repository = $this->defaultDAO->getRepository(User::class);

    $user = $repository->findOneBy([
      'username' => $registerData['username'],
      'email' => $registerData['username'],
    ],"OR");

    if( ! $user) $this->redirect('/default/',[
      'alert' => "Usuario no encontrado"
    ]);

    $hash = password_hash($registerData["pass"],PASSWORD_DEFAULT);

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

}
