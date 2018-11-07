<?php
namespace controller;

use controller\Controller as Controller;
use dao\DefaultDAO as DefaultDAO;
use model\User as User;
use helpers\ConverterCase as ConverterCase;

class TestController extends Controller{

  public function index(){

    $defaultDAO = new DefaultDAO();

    $repository = $defaultDAO->getRepository(User::class);
    $data = $repository->findOneBy("id_user", 12);

    print_r($data);

    $this->render('home');
  }
}
