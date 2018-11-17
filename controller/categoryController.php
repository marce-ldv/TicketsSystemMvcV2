<?php

namespace controller;

use model\Category as Category;
use dao\CategoryDAO as CategoryDAO;
use controller\Controller as Controller;
use interfaces\IAlmr as IAlmr;

class CategoryController extends Controller implements IAlmr
{
  private $categoryDao;

  function __construct()
  {
    parent::__construct();
    $this->categoryDao = CategoryDAO::getInstance();
  }

  public function index()
  {
      $this->list();
  }

  public function add($categoryData = [])
  {

    $category = new Category(
      '',
      $categoryData["name_category"]
    );

    $this->categoryDao->create($category);

    $this->redirect("/category/");
  }

  public function list() {

    if(! $this->isLogged())
      $this->redirect('/default/login');
    else {
      $categories = $this->categoryDao->readAll();
      $this->render("viewCategory/categories",[
        'categories' => $categories
      ]);
    }

  }

  public function remove($data)	{
		$searchedItem = $this->categoryDao->delete($data['id']);
		$this->redirect("/category/");
	}


  public function modify($categoryData = [])
  {
    $category = new Category(
      $categoryData['id'],
      $categoryData["name_category"]
    );

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

    //$this->render("viewCategory/updateCategory");

    $this->redirect('/category/');

  }

  public function viewEdit ($id) {
    $searchedItem = $this->categoryDao->read($id);
		$this->render('viewCategory/updateCategory',[
			'searchedItem' => $searchedItem
		]);
	}

}
