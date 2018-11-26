<?php
    
    namespace controller;
    
    use model\TypeArea as TypeArea;
    use dao\TypeAreaDAO as TypeAreaDAO;
    use controller\Controller as Controller;
    use helpers\ToArrayList;
    use Exception;
    use PDOException;
    
    class TypeAreaController extends Controller
    {
        private $controllerDao;
        
        /**
         * TypeAreaController constructor.
         */
        public function __construct () {
            parent::__construct();
            $this->controllerDao = TypeAreaDAO::getInstance();
        }
        
        /**
         *
         */
        public function index () {
            $this->list();
        }
        
        /**
         * @param array $data
         */
        public function add ($data = []) {
            
            $typeArea = new TypeArea('', $data['description']);
            $this->controllerDao->create($typeArea);
            
            //$this->redirect("/typeArea/");
            $this->index();
        }
        
        /**
         *
         */
        public function list () {
            
            $items = $this->controllerDao->readAll();
            $items = ToArrayList::convert($items);
            
            $this->render("viewTypeArea/typesAreas", [
                'items' => $items
            ]);
            
        }
        
        /**
         * @param array $data
         */
        public function remove ($data = []) {
            
            $this->controllerDao->delete($data['id']);
            
            $this->redirect("/typeArea/");
        }
        
        /**
         * @param $id
         */
        public function viewEdit ($id) {
            
            $searchedItem = $this->controllerDao->read($id);
            
            $this->render('viewTypeArea/updateTypeArea', [
                'searchedItem' => $searchedItem
            ]);
        }
        
        /**
         * @param array $data
         */
        public function modify ($data = []) {
            if (!$this->isMethod("POST")) $this->redirect("/default/");
            if (empty($data)) $this->redirect("/default/");
            
            $typeArea = new TypeArea($data['id'], $data['description']);
            
            try {
                $this->controllerDao->update($typeArea);
            } catch (PDOException $e) {
                echo $e->getMessage();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            
            $this->redirect('/typeArea/');
            
        }
    }
