<?php

namespace controller;
use dao\UserDAO as UserDao;
use model\User as User;
use controller\Controller as Controller;

// TODO: HAY QUE MODIFICAR LA LLAMADA A LAS VISTAS, DEBE LLAMAR AL METODO DE LA CONTROLADORA Y NO USAR REQUIRED NI INCLUDE
class UserController extends Controller{

  public $messageSuccess = "Registro Exitoso";
  public $messageWrong = "Hubo un problema y no se pudo completar el registro";

  protected $userDao;

  // TODO: IMPLEMENTAR CLASE CONCRETA PARA NO REPETIR CODIGOO

  function __construct() {
    parent::__construct();
    $this->userDao = UserDao::getInstance();
  }

  public function index(){
    $this->indexView();
  }

  public function login($username,$pass){
    try{
      $user = new User();
      $user->setUsername($username);

      if( ! $this->userDao->readByUser($user) ){
        $this->redirect('/default/index');

      }

      if(password_verify($pass,$user->getPass() ) ){
        //una vez que verifico que las password coinciden, antes de autoredireccionar al usuario, trabajamos con session

        $this->session->token = $user->serialize();

        $this->redirect('/default/dashboard');

      }else{

        $this->redirect('/default/index');
      }

    } catch(\PDOException $pdo_error) {
      $this->viewController->login();
    } catch(\Exception $error) {
      echo $error->getMessage();

      die();
    }
  }

  public function register ($username,$pass,$passAgain,$email,$name,$surname,$dni) {

    try {
      $regComplete = FALSE;

      $user = new User();
      $user->setUsername($username);
      $user->setEmail($email);

      $user_dao = $this->userDao;

      // TODO: Conviene modularizar y haverificar el usuario en la misma controladora
      if ( ! $user_dao->readByUser($user) ) {
        //comprobacion que la contraseña ingresada 2 veces sea la misma
        if($pass == $passAgain){
          //encriptacion de password
          $hash = password_hash($pass,PASSWORD_DEFAULT);
          //creacion de user con pass encriptada
          $user = new User($username,$hash,$email,$name,$surname,$dni);
          if ($user_dao->create($user)) {
            $regComplete = TRUE;
          }
        }

      }
      switch ($regComplete) {

        case TRUE:
        //$alert = $this->messageSucess;
        $this->render("home", array(
          "alert" => $this->messageSuccess
        ));
        break;

        case FALSE:
        $this->render("home", array(
          "alert" => $this->messageWrong
        ));
        break;
      }

    } catch(\PDOException $pdo_error) {
      $this->redirect('/default/index');
    } catch(\Exception $error) {
      echo $error->getMessage();
      die();
    }

  }

  public function logout()
  {
    $this->session->destroy();
    $this->redirect('/');
  }

}
