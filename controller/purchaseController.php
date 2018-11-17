<?php

namespace controller;
use controller\Controller as Controller;
use dao\PurchaseDAO as PurchaseDAO;
use dao\UserDAO;
use model\Purchase;

class PurchaseController extends Controller{

    public function index(){
        $this->render('viewPurchase/purchases');
    }
  
}
