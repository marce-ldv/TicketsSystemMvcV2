<?php

namespace controller;

use dao\TypeAreaDAO as TypeAreaDAO;
use controller\Controller as Controller;

class TypeAreaController extends Controller
{
    private $controllerDao;
    
    public function __construct () {
        parent::__construct();
        $this->controllerDao = TypeAreaDAO::getInstance();
    }

    public function index () {
        $this->list();
    }

    public function add ($typeAreaData = []) {
        $newTypeArea = new TypeArea(
            '',
            $controllerDao["description"],
        );

        $this->controllerDao->create($newTypeArea);

        $this->redirect("/typeArea/");
        return;
        //return $this->index();
    }

    public function list () {
		if ( ! $this->isLogged()) {
			$this->redirect('/default/login');
		}
		else {
			$items = $this->controllerDao->readAll();
			$this->render("viewTypeArea/typesAreas",[
				'items' => $items
			]);
		}
    }
    
    public function remove($data = []) {
		$searchedItem = $this->controllerDao->delete($data['id']);
		$this->redirect("/");
	}

	public function viewEdit ($id) {
		$searchedItem = $this->controllerDao->read($id);
		$this->render('viewTypeAreas/updateTypearea',[
			'searchedItem' => $searchedItem
		]);
	}

} // <----- end CLASS