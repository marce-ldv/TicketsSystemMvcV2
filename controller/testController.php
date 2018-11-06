<?php
namespace controller;

use controller\Controller as Controller;
use dao\DefaultDAO as DefaultDAO;
use model\User as User;
use model\Category as Category;
use helpers\ConverterCase as ConverterCase;

class TestController extends Controller{

  public function index(){

    $defaultDAO = new DefaultDAO();

    $repository = $defaultDAO->getRepository(Category::class);
    //$userCollection = $repository->findOneBy("name_user", "sergio");

    //var_dump($userCollection[0]->getUsername());

    //echo ConverterCase::toPlural("");

    $this->render('home');
  }
}
