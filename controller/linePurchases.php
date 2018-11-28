<?php
    /**
     * Created by PhpStorm.
     * User: sergio
     * Date: 11/28/2018
     * Time: 4:54 PM
     */
    
    namespace controller;
    
    
    use dao\{
        LinePurchaseDAO
    };
    use model\{
      LinePurchase as LinePurchase
    };

    class LinePurchases
    {
        
        private $controllerDao;
        
        public function __construct () {
            parent::__construct();
            $this->controllerDao = LinePurchaseDAO::getInstance();
        }
        
        /**
         *
         */
/*        public function index () {
            $this->list();
        }*/
        
        /**
         * @param array $data
         */
        public function add ($data = []) {
            //create -> La llave es el campo en la base de dato y el valor es el valor a guardar en la base de dato
            $artist = new LinePurchase(
            );
            
            $this->controllerDao->create($artist);
            
            $this->redirect("/artist/");
            
            return;
        }
        
        /**
         *
         */
/*        public function list () {
            //if ( ! $this->isLogged()) {
            //$this->redirect('/default/login');
            //}
            //else {
            
            $items = $this->controllerDao->readAll();
            
            if ($items) {
                $items = (!is_array($items)) ? [$items] : $items;
            } else {
                $items = [];
            }
            
            //		$items = $this->controllerDao->mapMethod($items);
            
            $this->render("viewArtist/artists", [
                'items' => $items
            ]);
            //}
        }*/
        
        /**
         * @param array $data
         */
        public function remove ($data = []) {
            
            $this->controllerDao->delete($data['id']);
            
            //$this->redirect("/artist/");
            $this->index();
        }
        
/*        public function viewEdit ($id) {
            
            $searchedItem = $this->controllerDao->read($id);
            
            //	$searchedItem = $this->controllerDao->mapMethod($searchedItem);
            
            $this->render('viewArtist/updateArtist', [
                'searchedItem' => $searchedItem
            ]);
        }*/
        
        /**
         * @param array $data
         */
/*        public function modify ($data = []) {
            if (!$this->isMethod("POST")) $this->redirect("/default/");
            if (empty($data)) $this->redirect("/default/");
            
            $artist = new Artist(
                $data["id"],
                $data["nickname"],
                $data["name"],
                $data["surname"]
            );
            
            try {
                $this->controllerDao->update($artist);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
            
            //$this->redirect('/artist/');
            
            $this->index();
            
        }*/
    }