<?php
    
    namespace model;
    
    use dao\EventAreaDAO;
    use helpers\{
        Collection as Collection,
        ToArrayList as ToArrayList
    };
    
    class Calendar
    {
        private $idCalendar;
        private $event;
        private $placeEvent;
        private $dateStart;
        private $dateEnd;
        private $eventsAreas;
        
        public function __construct ($idCalendar = "", Event $event = null, PlaceEvent $placeEvent = null, $dateStart = "", $dateEnd = "") {
            $this->idCalendar = $idCalendar;
            $this->event = $event;
            $this->placeEvent = $placeEvent;
            $this->dateEnd = $dateEnd;
            $this->dateStart = $dateStart;
            
            $this->eventsAreas = new Collection();
        }
        
        public function getIdCalendar () {
            return $this->idCalendar;
        }
        
        
        public function setCalendar ($idCalendar): void {
            $this->idCalendar = $idCalendar;
        }
        
        public function getEvent () {
            return $this->event;
        }
        
        public function setEvent ($event): void {
            $this->event = $event;
        }
        
        public function getPlaceEvent () {
            return $this->placeEvent;
        }
        
        public function setPlaceEvent ($placeEvent): void {
            $this->placeEvent = $placeEvent;
        }
        
        public function getDateStart () {
            return $this->dateStart;
        }
        
        public function setDateStart ($dateStart): void {
            $this->dateStart = $dateStart;
        }
        
        public function getDateEnd () {
            return $this->dateEnd;
        }
        
        public function setDateEnd ($dateEnd) {
            $this->dateEnd = $dateEnd;
        }
        
        public function getEventsAreas () {
            return $this->eventsAreas;
        }
        
        public function addEventArea (EventArea $eventArea) {
            $this->eventsAreas->add($eventArea);
        }
        
        public function initializeEventAreas () {
            $events = EventAreaDAO::getInstance()->readByCalendar($this->idCalendar);
            $events = ToArrayList::convert($events);
            $events = Collection::createFromArray($events);
            $this->eventsAreas = $events;
        }
        
    }
