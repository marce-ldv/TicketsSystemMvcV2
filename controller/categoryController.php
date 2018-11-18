<?php

namespace controller;

use model\Category as Category;
use dao\CategoryDAO as CategoryDAO;
use controller\Controller as Controller;

class CategoryController extends Controller
{
  private $categoryDao;

  function __construct()
  {
    parent::__construct();
    $this->categoryDao = CategoryDAO::getInstance();
  }

  public function index()
  {
      $categories = $this->categoryDao->readAll();

      $this->render("viewCategory/categories",[
        "categories" => $categories
      ]);
  }

  public function save($categoryData)
  {
    $newCategory = new Category();

    $newCategory->setDescription($categoryData["description"]);

    $this->categoryDao->create($newCategory);

    $this->redirect("/category/");
  }

  public function list()
  {
    $listCategories = $this->categoryDao->readAll();

    if(! $this->isLogged())
    $this->redirect('/default/login');
    else
    $this->render("viewCategory/listCategory",array(
      'listCategories' => $listCategories
    ));
  }
}
