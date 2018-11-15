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

  public function save($categoryData = [])
  {

    $newCategory = new Category();

    $newCategory->setNameCategory($categoryData["name_category"]);

    $this->categoryDao->create($newCategory);

    $this->redirect("/category/");
  }

  public function create()
  {
    if( ! $this->isLogged())
    $this->redirect('/default/login');
    else
    $this->render("viewCategory/categories");
  }

  public function list()
  {
    $listCategories = $this->categoryDao->readAll();

    if(! $this->isLogged())
    $this->redirect('/default/login');
    else
    $this->render("viewCategory/categories",array(
      'listCategories' => $listCategories
    ));
  }

  public function delete($id)
	{
		$searchedCategory = $this->categoryDao->delete($id);
		$this->redirect("/category/");
	}


  public function updateC($categoryData = [])
  {
    $newCategory = new Category();

    $newCategory->setNameCategory($categoryData["name_category"]);

    try
    {
      $this->categoryDao->update($category);
    }
    catch(\PDOException $e)
    {
      echo $e->getMessage();
    }
    catch(\Exception $e){
      echo $e->getMessage();
    }

    $searchedArtist = $this->categoryDao->read($id_category); // categoria buscada

    $this->render("viewCategory/updateCategory");

    $this->redirect('/category/');

  }

}
