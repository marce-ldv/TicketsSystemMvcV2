<?php
namespace controller;

use controller\Controller as Controller;
use model\User as User;
use model\Category as Category;
use helpers\ConverterCase as ConverterCase;
use dao\DefaultDAO as DefaultDAO;

class TestController extends Controller{

  public function index(){
    $this->render("home");
  }
  
}
