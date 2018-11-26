<?php
    
    namespace controller;
    
    use helpers\ToArrayList as ToArrayList;
    use model\Event as Event;
    use dao\EventDAO as EventDAO;
    use dao\CategoryDAO as CategoryDAO;
    use controller\Controller as Controller;
    use interfaces\IAlmr as IAlmr;
    
    class EventController extends Controller
    {
        
        private $controllerDao;
        
        public function __construct () {
            parent::__construct();
            $this->controllerDao = EventDAO::getInstance();
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
            //create -> La llave es el campo en la base de dato y el valor es el valor a guardar en la base de dato
            
            $event = new Event(
                '',
                $data["idCategory"],
                $data["title"]
            );
            
            $this->controllerDao->create($event);
            
            $this->redirect("/event/");
            
            return;
        }
    
        /**
         *
         */
        public function list () {
            $items = $this->controllerDao->readAll();
            $items = ToArrayList::convert($items);
            
            $dao = CategoryDAO::getInstance();
            $categories = $dao->readAll();
            $categories = ToArrayList::convert($categories);
            
            $this->render("viewEvent/events", [
                'items' => $items,
                'categories' => $categories
            ]);
            //}
        }
    
        /**
         * @param array $data
         */
        public function remove ($data = []) {
            
            $this->controllerDao->delete($data['idEvent']);
            
            //$this->redirect("/event/");
            $this->index();
        }
    
        /**
         * @param $id
         */
        public function viewEdit ($id) {
            
            $searchedItem = $this->controllerDao->read($id);
    
            $dao = CategoryDAO::getInstance();
            $categories = $dao->readAll();
            $categories = ToArrayList::convert($categories);
            
            $this->render('viewEvent/updateEvent', [
                'searchedItem' => $searchedItem,
                'categories' => $categories
            ]);
        }
    
        /**
         * @param array $data
         */
        public function modify ($data = []) {
            if (!$this->isMethod("POST")) $this->redirect("/default/");
            if (empty($data)) $this->redirect("/default/");
            
            $event = new Event(
                $data["idEvent"],
                $data["idCategory"],
                $data["title"]
            );
            
            try {
                $this->controllerDao->update($event);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
            
            //$this->redirect('/event/');
            
            $this->index();
            
        }
        
    }
