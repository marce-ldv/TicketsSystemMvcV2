<?php
namespace controller;

use controller\Controller as Controller;
use model\User as User;
use model\Category as Category;
use helpers\ConverterCase as ConverterCase;
use dao\DefaultDAO as DefaultDAO;

class TestController extends Controller{

  public function index(){
    $this->render("test/home");
  }

  public function register ($registerData = []) {

    if ($this->isMethod("POST")) $this->redirect("/test/");
    if (empty($registerData)) $this->redirect("/test/"); 

    $user = new User();
    $repository = $this->defaultDAO->getRepository(User::class);
    $criteria = [
      "username" => $registerData["username"],
      "email" => $registerData["email"]
    ];

<<<<<<< HEAD
    $category->setDescription("My car is blue");
    $category->setIdCategory(null);
=======
    if ($repository->findOneBy($criteria, "OR")) {
       $this->redirect("/test/", ["alert" => "El usuario o email ya estan registrados"]);
     }
>>>>>>> b150d9e70ccf3b5bd57cd0d30bb05fc855bd3bec

    if ($registerData["pass"] != $registerData["passAgain"]) {
      $this->redirect("/test/", ["alert" => "Las contraseñas no coinciden"]);
     }

    $hash = password_hash($registerData["pass"],PASSWORD_DEFAULT);

<<<<<<< HEAD
    $this->render('home');
=======
    $user->setUsername($registerData["username"])
      ->setPass($hash)
      ->setEmail($registerData["email"])
      ->setRoleUser("user")
      ->setNameUser($registerData["name_user"])
      ->setSurname($registerData["surname"])
      ->setDni($registerData["dni"]);

    $repository->create($user);

    $this->redirect ('/test/', ["alert" => "Usuario creado con exito"]);
>>>>>>> b150d9e70ccf3b5bd57cd0d30bb05fc855bd3bec
  }

  public function viewEvento(){
    $this->render('dashboard');
  }

}
