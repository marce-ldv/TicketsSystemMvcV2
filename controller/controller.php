<?php

namespace controller;
use model\User as User;
use helpers\Session as Session;
use dao\UserDAO as UserDao;
use dao\DefaultDAO as DefaultDAO;

class Controller{

  protected $session;
  protected $defaultDAO;

  public function __construct(){
    $this->session = Session::getInstance();
    $this->defaultDAO = new DefaultDAO();
  }

  public function getToken(){
    if( ! isset($this->session->token))
      return false;

    $user = new User();
    $user->unserialize($this->session->token);
    return $user;
  }

  public function isLogged(){
    return ($this->getToken() ? true : false);
  }

  public function redirect($url){
    header("location: ". VIEW_URL . $url);
  }

  public function render($path, $options = "") {
        if ( ! empty($options)) {
            forEach($options as $key => $value) {
                ${$key} = $value;
            }
        }

        include URL_VIEW . 'header.php';
        require(URL_VIEW . "$path" . ".php");
        include URL_VIEW . 'footer.php';
    }


}
