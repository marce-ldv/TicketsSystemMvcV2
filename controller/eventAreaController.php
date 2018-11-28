<?php

namespace controller;

use dao\{
    EventAreaDAO as EventAreaDAO,
    CalendarDAO as CalendarDAO,
    TypeAreaDAO as TypeAreaDAO
};
use controller\Controller as Controller;
use model\EventArea;
use PDOException;
use Exception;
use helpers\ToArrayList;

//echo phpInfo();
class EventAreaController extends Controller
{
    private $controllerDao;
    
    public function __construct () {
        parent::__construct();
        $this->controllerDao = EventAreaDAO::getInstance();
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

        $calendarDAO = CalendarDAO::getInstance();
        $typeAreaDAO = TypeAreaDAO::getInstance();
        
        $calendar = $calendarDAO->read($data['idCalendar']);
        $typeArea = $typeAreaDAO->read($data['idTypeArea']);
        
        $eventArea = new EventArea(
            '',
            $typeArea,
            $calendar,
            $data["quantity"],
            $data['price'],
            $data["quantity"]
        );
        
        $this->controllerDao->create($eventArea);
        
        $this->redirect("/eventArea/");
        
        return;
    }
    
    /**
     *
     */
    public function list () {
        if ( ! $this->isLogged()) $this->redirect('/default/login');
        
        $items = $this->controllerDao->readAll();
        $calendars = CalendarDAO::getInstance()->readAll();
        $typeAreas = TypeAreaDAO::getInstance()->readAll();
        
        $items = ToArrayList::convert($items);
        $calendars = ToArrayList::convert($calendars);
        $typeAreas = ToArrayList::convert($typeAreas);

        $this->render("viewEventArea/eventsAreas", [
            'items' => $items,
            'calendars' => $calendars,
            'typeAreas' => $typeAreas
        ]);
        //}
    }
    
    /**
     * @param array $data
     */
    public function remove ($data = []) {
        
        $this->controllerDao->delete($data['id']);
        
        //$this->redirect("/artist/");
        $this->index();
    }
    
    public function viewEdit ($id) {
        
        $searchedItem = $this->controllerDao->read($id);
        $calendars = CalendarDAO::getInstance()->readAll();
        $typeAreas = TypeAreaDAO::getInstance()->readAll();
        $calendars = ToArrayList::convert($calendars);
        $typeAreas = ToArrayList::convert($typeAreas);
        
        //	$searchedItem = $this->controllerDao->mapMethod($searchedItem);
        
        $this->render('viewEventArea/updateEventArea', [
            'searchedItem' => $searchedItem,
            'calendars' => $calendars,
            'typeAreas' => $typeAreas
        ]);
    }
    
    /**
     * @param array $data
     */
    public function modify ($data = []) {
        if (!$this->isMethod("POST")) $this->redirect("/default/");
        if (empty($data)) $this->redirect("/default/");
        
        $typeArea = TypeAreaDAO::getInstance()->read($data['idTypeArea']);
        $calendar = CalendarDAO::getInstance()->read($data['idCalendar']);
        
        $eventArea = new EventArea(
            $data['id'],
            $typeArea,
            $calendar,
            $data['quantity'],
            $data['price'],
            $data['quantity']
        );
        
        try {
            $this->controllerDao->update($eventArea);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        
        //$this->redirect('/artist/');
        
        $this->index();
        
    }

} // <----- end CLASS
