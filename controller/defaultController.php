<?php

namespace controller;
use controller\Controller as Controller;

class DefaultController extends Controller{

  public function index(){
    $this->render('home');
  }

  public function dashboard(){
    $this->render('dashboard');
  }
  
}
