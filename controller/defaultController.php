<?php

namespace controller;
use model\User as User;
use helpers\Session as Session;
use dao\UserDAO as UserDao;
use controller\Controller as Controller;

class DefaultController extends Controller{

  public function index(){
    $this->render('home');
  }

  public function register(){
    $this->render('register');
  }

  public function login(){
    $this->render('login');
  }

  public function dashboard(){
    $this->render('dashboard');
  }

  public function viewArtist(){
    $this->render('viewArtist/artistCreate');
  }


}
