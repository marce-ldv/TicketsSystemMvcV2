<?php
    
    namespace model;
    
    class Ticket
    {
        private $idTicketNumber;
        private $qr;
        private $linePurchase;
        
        
        public function __construct ($idTicketNumber = "", $qr = "", LinePurchase $linePurchase) {
            $this->idTicketNumber = $idTicketNumber;
            $this->qr = $qr;
            $this->linePurchase = $linePurchase;
        }
        
        /**
         * @return LinePurchase
         */
        public function getLinePurchase () {
            return $this->linePurchase;
        }
        
        /**
         * @param mixed $linePurchase
         */
        public function setLinePurchase ($linePurchase): void {
            $this->linePurchase = $linePurchase;
        }
        
        /**
         * @return mixed
         */
        public function getIdTicketNumber () {
            return $this->idTicketNumber;
        }
        
        
        /**
         * @return mixed
         */
        public function getQr () {
            return $this->qr;
        }
        
        
        /**
         * @param mixed $idTicketNumber
         *
         * @return self
         */
        public function setIdTicketNumber ($idTicketNumber): void {
            $this->idTicketNumber = $idTicketNumber;
        }

//SETTERS
        
        
        /**
         * @param mixed $qr
         *
         * @return self
         */
        public function setQr ($qr): void {
            $this->qr = $qr;
        }
        
    }
