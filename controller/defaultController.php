<?php

namespace controller;
use model\User as User;
use helpers\Session as Session;
use dao\UserDAO as UserDao;
use controller\Controller as Controller;

class DefaultController extends Controller{

  public function index(){
    $this->render('home');
  }

  public function dashboard(){
    $this->render('dashboard');
  }

  public function viewAdmin(){
    $this->render('viewAdmin/home');
  }

  public function viewArtist(){
    $this->render('viewArtist/artists');
  }

  public function viewCategory(){
    $this->render('viewCategory/categories');
  }

  public function viewEvent(){
    $this->render('viewEvent/events');
  }

  public function viewPurchase(){
    $this->render('viewPurchase/purchases');
  }

  public function viewTypeArea(){
    $this->render('viewTypeArea/typesAreas');
  }

  public function viewTypeArea(){
    $this->render('viewTypeArea/typesAreas');
  }

  public function viewPlaceEvent(){
    $this->render('viewPlaceEvent/placeEvent');
  }

  public function viewEventArea(){
    $this->render('viewEventArea/eventArea');
  }




}
