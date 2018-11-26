<?php

namespace controller;
use model\User as User;
use controller\FileCcontroller as FileController;
use controller\Controller as Controller;
use controller\DefaultController as DefaultController;
use dao\UserDAO as UserDAO;

class UserController extends Controller{
  private $userDAO,$defaultController;

  public function __construct () {
    parent::__construct();
    //$this->userDAO = new UserDAO();
    $this->defaultController = new DefaultController();
  }

  public function index(){
    return;
  }
  /*
    * Este método verifica si existe un usuario en sesion y en caso
    * afirmativo lo toma de la base de datos y compara contraseñas.
    * Esto lo hace con el fin de asegurar que si cambio algun dato
    * obtiene la información actualizada.
  */
  public function checkSession(){
    if( session_status == PHP_SESSION_NONE ){
      session_start();
    }

    if( isset($_SESSION['userLogedIn'])){
      //$userDao = new User();

      $usr = $this->userDAO->read( $_SESSION['userLogedIn']->getUsername() );

      if( $user->getPass() == $_SESSION['userLogedIn']->getPass() ){
        return $user;
      }
    }else{
      return false;
    }
  }
  //Setea la session, tambien podria usarse el metodo magico __set del fichero session en la carpeta helpers
  public function setSession($user) {
    $_SESSION['userLogedIn'] = $user;
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
    //if ( ! $this->isMethod("POST")) $this->redirect("/default/");
    //if (empty($registerData)) $this->redirect("/default/");

    /*if( ! $user = $this->userDAO->readByUser($registerData["username"]) ) {
        $this->redirect('/default/',[
        'queMierdaPasa' => "PAsa algo en readByUser"
      ]);
      return;
    }*/
    $username = $registerData['username'];
    $pass = $registerData['pass'];

    //$userDao = new User();

    $user =  $this->userDAO->read( $username );

    if( $user ){
      if( $user->getPass() == $pass ){
        $this->setSession( $user );
        return $user;
      }
    }

    return false;

    //$user = $this->userDAO->mapMethod($user);
    /*if( ! password_verify($registerData["pass"],$user->getPass()) ){
      $this->redirect('/default/',[
        'alert' => "Password incorrecta"
      ]);
      return ;
    }*/

    //$this->session->token = $user->serialize();

    //$this->redirect('/default/dashboard/');

  }

  public function logout()
  {
    //$this->session->destroy();
    //$this->redirect('/');
    if (session_status() == PHP_SESSION_NONE)
        session_start();

    unset($_SESSION['userLogedIn']);

    $this->DefaultController->index();
  }


}
