<?php
namespace controller;

use controller\Controller as Controller;
use model\User as User;
use model\Category as Category;
use helpers\ConverterCase as ConverterCase;

class TestController extends Controller{

  public function index(){

    $category = new Category();

    $category->setDescription("Segio es groso :D:D:D:D:D:D");
    $category->setIdCategory(null);

    $repository = $this->defaultDAO->getRepository(Category::class);

    $repository->create($category);


<<<<<<< HEAD
    //echo ConverterCase::toPlural("Category_x_Product");
=======
>>>>>>> de2e847d4007c7ede05fb6fe2a49a281d40a13a5

    $this->render('home');
  }
}
