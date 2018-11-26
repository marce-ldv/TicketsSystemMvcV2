<?php
    
    namespace controller;
    
    use helpers\ToArrayList;
    use model\Calendar as Calendar;
    use dao\CalendarDAO as CalendarDAO;
    use dao\EventDAO as EventDAO;
    use dao\PlaceEventDAO as PlaceEventDAO;
    use controller\Controller as Controller;
    use interfaces\IAlmr as IAlmr;

    /**
     * Class CalendarController
     * @package controller
     */
    class CalendarController extends Controller implements IAlmr
    {
        private $controllerDao;
        private $eventDao;
        private $placeEventDao;
    
        /**
         * CalendarController constructor.
         */
        function __construct () {
            parent::__construct();
            $this->controllerDao = CalendarDAO::getInstance();
            $this->eventDao = EventDAO::getInstance();
            $this->placeEventDao = PlaceEventDAO::getInstance();
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
            
            $event = $this->eventDao->read($data['idEvent']);
            $placeEvent = $this->placeEventDao->read($data['idPlaceEvent']);
            
            $calendar = new Calendar(
                '',
                $event,
                $placeEvent,
                $data["dateStart"],
                $data["dateEnd"]
            );
            
            $this->controllerDao->create($calendar);
            
            $this->redirect("/calendar/");
            
            return;
        }
    
        /**
         *
         */
        public function list () {
            if (!$this->isLogged()) {
                $this->redirect('/default/login');
            } else {
                
                $items = $this->controllerDao->readAll();
                $items = ToArrayList::convert($items);
                
                $events = $this->eventDao->readAll();
                $events = ToArrayList::convert($events);
                
                $placeEvents = $this->placeEventDao->readAll();
                $placeEvents = ToArrayList::convert($placeEvents);
                
                $this->render("viewCalendar/calendars", [
                    'items' => $items,
                    'events' => $events,
                    'placeEvents' => $placeEvents
                ]);
            }
        }
    
        /**
         * @param array $data
         */
        public function remove ($data = []) {
            
            $this->controllerDao->delete($data['idCalendar']);
            
            $this->redirect("/calendar/");
        }
        
        public function viewEdit ($id) {
            
            $searchedItem = $this->controllerDao->read($id);
            
            $events = $this->eventDao->readAll();
            $events = ToArrayList::convert($events);
            
            $placeEvents = $this->placeEventDao->readAll();
            $placeEvents = ToArrayList::convert($placeEvents);
            
            $this->render('viewCalendar/updateCalendar', [
                'searchedItem' => $searchedItem,
                'events' => $events,
                'placeEvents' => $placeEvents
            ]);
        }
        
        public function modify ($data = []) {
            if (!$this->isMethod("POST")) $this->redirect("/default/");
            if (empty($data)) $this->redirect("/default/");
            
            try {
    
                $event = $this->eventDao->read($data['idEvent']);
                $placeEvent = $this->placeEventDao->read($data['idPlaceEvent']);
    
                $calendar = new Calendar(
                    $data['id'],
                    $event,
                    $placeEvent,
                    $data["dateStart"],
                    $data["dateEnd"]
                );
                
                $this->controllerDao->update($calendar);
                
            } catch (PDOException $e) {
                echo $e->getMessage();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            
            $this->redirect('/calendar/');
            
        }
        
    }
