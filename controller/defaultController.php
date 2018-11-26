<?php

namespace controller;
use controller\Controller as Controller;
use controller\UserController as UserController;

class DefaultController extends Controller{

  public function __construct(){
    $this->userController = new UserController();
  }

  public function index(){

    

    $this->render('home');
  }

  public function dashboard(){
    $this->render('dashboard');
  }
  
}
