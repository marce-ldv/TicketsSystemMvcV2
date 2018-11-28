<?php
    
    namespace controller;
    
    use model\PlaceEvent as PlaceEvent;
    use dao\PlaceEventDAO as PlaceEventDAO;
    use controller\Controller as Controller;
    use helpers\ToArrayList as ToArrayList;

    /**
     * Class PlaceEventController
     * @package controller
     */
    class PlaceEventController extends Controller
    {
        
        private $controllerDao;
    
        /**
         * PlaceEventController constructor.
         */
        public function __construct () {
            parent::__construct();
            $this->controllerDao = PlaceEventDAO::getInstance();
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
            
            $placeEvent = new PlaceEvent(
                '',
                $data["capacity"],
                $data["_description"]
            );
            
            $this->controllerDao->create($placeEvent);
            
            $this->redirect("/placeEvent/");
            
            return;
        }
    
        /**
         *
         */
        public function list () {
            //if ( ! $this->isLogged()) {
            //	$this->redirect('/default/login');
            //}
            //else {
            
            $items = $this->controllerDao->readAll();
            
            $items = ToArrayList::convert($items);
            
            $this->render("viewPlaceEvent/placeEvent", [
                'items' => $items
            ]);
            //}
        }
    
        /**
         * @param array $data
         */
        public function remove ($data = []) {
            
            $this->controllerDao->delete($data['id']);
            $this->index();
        }
        
        public function viewEdit ($id) {
            
            $searchedItem = $this->controllerDao->read($id);
            
            $this->render('viewPlaceEvent/updatePlaceEvent', [
                'searchedItem' => $searchedItem
            ]);
        }
    
        /**
         * @param array $data
         */
        public function modify ($data = []) {
            if (!$this->isMethod("POST")) $this->redirect("/default/");
            if (empty($data)) $this->redirect("/default/");
            
            $placeEvent = new PlaceEvent(
                $data['id'],
                $data["capacity"],
                $data["_description"]
            );
            
            try {
                $this->controllerDao->update($placeEvent);
            } catch (PDOException $e) {
                echo $e->getMessage();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            
            $this->index();
        }
        
    }
