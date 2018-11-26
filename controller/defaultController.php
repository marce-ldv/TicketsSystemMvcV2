<?php

namespace controller;
use controller\Controller as Controller;
use controller\UserController as UserController;

class DefaultController extends Controller{

  protected $userController;

  public function __construct(){
    $this->userController = new UserController();
  }
/*
  public function index($data = []) {

    $showHome = false; // Esto se vuelve true solo si hay un usuario logueado.
    $_user = $data['username'];
    $_pass = $data['pass'];
    // Verifico si existe un usuario logueado. Le paso la responsabilidad a UserController de verificarlo
    if($user = $this->userController->checkSession()) {
         $showHome = true;
    } else {

         // Si no hay usuario logueado pero viene un usuario como parametro, es un intento de logueo.
         if(isset($_user)) {

              // Intento loguear. Le paso la responsabilidad a UserController. Si es true, muetro home. Caso contrario sigo...
              if($user = $this->userController->login($_user, $_pass)) {
                   $showHome = true;
              } else {
                   $alert = "Datos incorrectos, vuelva a intentar.";
              }
         }
    }

    include_once VIEWS . '/header.php';

    if($showHome)
         $this->render();
    else
         include_once VIEWS . '/login.php';

    include_once VIEWS . '/footer.php';
}
*/
  public function dashboard(){
    $this->render('dashboard');
  }
  
}
