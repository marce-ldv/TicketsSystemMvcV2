<?php
    /**
     * Created by PhpStorm.
     * User: sergio
     * Date: 11/28/2018
     * Time: 4:30 PM
     */
    
    namespace controller;
    
    use controller\Controller;
    use dao\{
        Connection, EventAreaDAO, LinePurchaseDAO, PurchaseDAO as PurchaseDAO, TicketDAO
    };
    use model\{
        Purchase as Purchase,
        LinePurchase as LinePurchase,
        Ticket as Ticket
    };
    
    class cartController extends Controller
    {
        public function index () {
            
            $itemsCart = [];
            $total = 0;
            
            foreach ($this->session->cart as $itemCart) {
                $eventArea = EventAreaDAO::getInstance()->read($itemCart['idEventArea']);
                $item['tituloEvento'] = $eventArea->getCalendar()->getEvent()->getTitleEvent();
                $item['quantity'] = $itemCart['quantity'];
                $item['price'] = $itemCart['price'];
                $total += $item['price'];
                $itemsCart[] = $item;
            }
            
            $this->render('carrito',[
                'total' => $total,
                'itemsCart' => $itemsCart
            ]);
        }
        
        public function buyPage () {
            $this->render('checkout');
        }
        
        /**
         * @param $data [idEventArea, quantity]
         */
        public function addToCart ($data) {
            $eventArea = EventAreaDAO::getInstance()->read($data['idEventArea']);
            $price = $eventArea->getPrice();
            $total = $price * $data['quantity'];
            $data['price'] = $total;
            $sessionArray = $this->session->cart;
            $sessionArray[] = $data;
            $this->session->cart = $sessionArray;
            $this->redirect("/shop/");
        }
        
        public function buy () {
            $purchase = new Purchase(
                '',
                $this->getToken(),
                ''
            );
            
            if (!PurchaseDAO::getInstance()->create($purchase)) {
                return;
            }
            
            $lastId = Connection::getInstance()->getLastInsertId();
            $purchase->setIdPurchase($lastId);
            
            $this->createLinesPurchases($purchase);
            $this->session->cart = [];
            $this->redirect("/");
        }
        
        private function createLinesPurchases ($purchase) {
            foreach ($this->session->cart as $itemCart) {
                $eventArea = EventAreaDAO::getInstance()->read($itemCart['idEventArea']);
                $linePurchase = new LinePurchase(
                    '',
                    $eventArea,
                    $purchase,
                    $itemCart['quantity'],
                    $itemCart['price']
                );
                
                try {
                    LinePurchaseDAO::getInstance()->create($linePurchase);
                    $lastId = Connection::getInstance()->getLastInsertId();
                    $linePurchase->setIdLinePurchases($lastId);
                    $ticket = new Ticket(
                        '',
                        '',
                        $linePurchase
                    );
                    TicketDAO::getInstance()->create($ticket);
                } catch (\PDOException $e) {
                    throw $e;
                }
            }
        }
    }