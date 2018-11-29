<?php
    
    namespace model;
    
    use model\{
        EventArea as EventArea,
        Purchase as Purchase
    };
    
    class LinePurchase
    {
        private $idLinePurchases;
        private $purchases;
        private $quantity;
        private $price;
        private $eventArea;
        
        /**
         * LinePurchase constructor.
         * @param string $idLinePurchases
         * @param EventArea $eventArea
         * @param Purchase $purchases
         * @param string $quantity
         * @param string $price
         */
        public function __construct ($idLinePurchases = "", EventArea $eventArea = null, Purchase $purchases = null, $quantity = "", $price = "") {
            $this->idLinePurchases = $idLinePurchases;
            $this->purchases = $purchases;
            $this->quantity = $quantity;
            $this->price = $price;
            $this->eventArea = $eventArea;
        }
        
        /**
         * @return EventArea
         */
        public function getEventArea (): EventArea {
            return $this->eventArea;
        }
        
        /**
         * @param EventArea $eventArea
         */
        public function setEventArea (EventArea $eventArea): void {
            $this->eventArea = $eventArea;
        }
        
        //GETTERS
        public function getIdLinePurchases () {
            return $this->idLinePurchases;
        }
        
        /**
         * @return Purchase
         */
        public function getPurchases () {
            return $this->purchases;
        }
        
        public function getQuantity () {
            return $this->quantity;
        }
    
        /**
         * @return string
         */
        public function getPrice () {
            return $this->price;
        }
        
        //SETTERS
        
        public function setIdLinePurchases ($value) {
            $this->idLinePurchases = $value;
        }
        
        /**
         * @param Purchase $value
         */
        public function setPurchases (Purchase $value): void {
            $this->purchases = $value;
        }
        
        public function setQuantity ($value): void {
            $this->quantity = $value;
        }
        
        public function setPrice ($value): void {
            $this->price = $value;
        }
    }
