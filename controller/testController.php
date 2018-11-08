<?php
namespace controller;

use controller\Controller as Controller;
use model\User as User;
use model\Category as Category;
use helpers\ConverterCase as ConverterCase;

class TestController extends Controller{

  public function index(){

    $category = new Category();

    $category->setDescription("My car is blue");
    $category->setIdCategory(null);

    $repository = $this->defaultDAO->getRepository(Category::class);

    $repository->create($category);

    $this->render('home');
  }

  public function viewEvento(){
    $this->render('dashboard');
  }

}
