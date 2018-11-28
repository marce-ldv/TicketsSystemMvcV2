<?php
    /**
     * Created by PhpStorm.
     * User: sergio
     * Date: 11/28/2018
     * Time: 4:35 PM
     */
    
    namespace controller;
    
    use dao\CalendarDAO;
    use helpers\ToArrayList;
    use controller\Controller;
    
    class ShopController extends Controller
    {
        public function index () {
        
            $calendars = CalendarDAO::getInstance()->readAll();
            $calendars = ToArrayList::convert($calendars);
        
            $this->render('shop',[
                'calendars' => $calendars
            ]);
        }
    }