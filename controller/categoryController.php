<?php

namespace controller;

use model\Category as Category;
use dao\CategoryDAO as CategoryDAO;
use controller\Controller as Controller;
use interfaces\IAlmr as IAlmr;

class CategoryController extends Controller implements IAlmr
{
  private $controllerDao;

  function __construct()
  {
    parent::__construct();
    $this->controllerDao = CategoryDAO::getInstance();
  }

  public function index()
  {
    $this->list();
  }

  public function add ($data = []) {
    //create -> La llave es el campo en la base de dato y el valor es el valor a guardar en la base de dato

    $category = new Category(
      '',
      $data["name_category"]
    );

    $this->controllerDao->create($category);

    $this->redirect("/category/");

    return;
  }

  public function list () {
    //if ( ! $this->isLogged()) {
      //$this->redirect('/default/login');
    //}
    //else {

      $items = $this->controllerDao->readAll();

      if ($items) {
        $items = (! is_array($items)) ? [$items] : $items;
      }else {
        $items = [];
      }

      //$items = $this->controllerDao->mapMethod($items);

      $this->render("viewCategory/categories",[
        'items' => $items
      ]);
    //}
  }

  public function remove($data = []) {

    $this->controllerDao->delete($data['id']);

    //$this->redirect("/category/");
    $this->index();
  }

  public function viewEdit ($id) {

    $searchedItem = $this->controllerDao->read($id);

    //    $searchedItem = $this->controllerDao->mapMethod($searchedItem);

    $this->render('viewCategory/updateCategory',[
      'searchedItem' => $searchedItem
    ]);
  }

  public function modify($data = [])
  {
    if ( ! $this->isMethod("POST")) $this->redirect("/default/");
    if (empty($data)) $this->redirect("/default/");

    $category = new Category(
      $data["id"],
      $data["name_category"]
    );

    try
    {
      $this->controllerDao->update($category);
    }
    catch(\PDOException $e)
    {
      echo $e->getMessage();
    }
    catch(\Exception $e){
      echo $e->getMessage();
    }

    //    $this->redirect('/category/');

    $this->index();

  }
}
