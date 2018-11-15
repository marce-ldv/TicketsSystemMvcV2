<?php

namespace controller;
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

  public function viewCreateEvent(){
    $this->render('viewEvent/createEvent');
  }

  public function viewPurchase(){
    $this->render('viewPurchase/purchases');
  }

  public function viewTypeArea(){
    $this->render('viewTypeArea/typesAreas');
  }

  public function viewPlaceEvent(){
    $this->render('viewPlaceEvent/placeEvent');
  }

  public function viewEventArea(){
    $this->render('viewEventArea/createEventArea');
  }

  public function viewCreateCalendar(){
    $this->render('viewCalendar/createCalendar');
  }

  public function viewTicket(){
    $this->render('viewTicket/ticket');
  }



}
