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

    $category = new Category();

    $category->setDescription("Segio es groso :D:D:D:D:D:D");
    $category->setIdCategory(null);

    $repository = $defaultDAO->getRepository(Category::class);

    $repository->create($category);



    $this->render('home');
  }
}
