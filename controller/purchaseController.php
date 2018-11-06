<?php

namespace controller;
use controller\Controller as Controller;
use dao\PurchaseDAO as PurchaseDAO;
use dao\UserDAO;
use model\Purchase;

class PurchaseController extends Controller{

  public function create(){
    if ( ! $this->isLogged()) {
      $this->redirect("/");
    }

    $messageOk = "";
    $messageWrong = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      //
      $purchaseDAO = PurchaseDAO::getInstance();
      $userDAO = UserDAO::getInstance();

      $purchase = new Purchase();
      $user = $this->getToken();
      $userDAO->readByUsername($user);

      $purchase->setUser($user);
      //print_r($purchase->getUser().PHP_EOL);

      if ( ! $purchaseDAO->create($purchase) ) {
        $messageWrong = "nose puedo crear :'v";
      } else {
        $messageOk = ":D:D:D:D:D:D:D:";
      }

    }

    $this->render('viewPurchases/createPurchase', array(
      "messageOk" => $messageOk ,
      "messageWrong" => $messageWrong
    ));
  }
}
