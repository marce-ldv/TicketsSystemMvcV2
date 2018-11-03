<?php

namespace controller;

use model\Event as Event;
use dao\EventDAO as EventDAO;
use controller\Controller as Controller;

class EventController extends Controller
{
	private $eventDao;

    public function __construct()
    {
        parent::__construct();
    	$this->eventDAO = EventDAO::getInstance();        
    }

    public function save($category, $title)
    {

    	$newEvent = new Event($category, $title);

    	$message['message'] = "EL EVENTO SE AGREGO CON EXITO !!";
    	$message['type'] = "success";
    	try{
    		$this->eventDao->create($newEvent);


	    }catch(\PDOException $e){
            $message['message'] = "UPS! ERROR PDO: " . $e->getMessage() . "| CODE: " . $e->getCode();
	    	$message['type'] = "danger";


	    }catch(\Exception $e){    	
            $message['message'] = "UPS! ERROR EXCEPTION: " . $e->getMessage() . "| CODE: " . $e->getCode();
	    	$message['type'] = "danger";
	    }

    	$this->render("viewEvent/createEvent");
    }

    public function create()
    {
    	//if($this->session->__isset('rol')){
    	//	$rol = $this->session->__get('rol');
    	//	if($rol === 'admin'){
    			if( ! $this->isLogged())
            $this->redirect('/default/login');
        else
            $this->render("viewEvent/createEvent");
    	//	}else {
    	//		echo "NO TENES SUFICIENTES PRIVILEGIOS";
    	//	}
    	//}else {
    	//	echo "SIN PRIVILEGIOS";
    	//}
    }

    public function list() //listar todo
    {
        $listEvents = $this->eventDao->readAll();

        if( ! $this->isLogged())
            $this->redirect('/default/login');
        else
            $this->render("viewEvent/listEvent",array(
            'listEvent' => $listEvent
        ));

    }

    public function delete($id)
    {
        $searchedEvent = $this->eventDao->delete($id);
        $this->list(); // reutilizo el list()
    }


    public function update($category,$title)
    {       
        $event = new Event($category, $title);
        
        
        // se muestra que se modifico correctamente el evento
            $mensaje['mensaje'] = "EL ARTISTA SE MODIFICO CON EXITO !";
            $mensaje['tipo'] = "success";

        try
        {
            $this->eventDao->update($event);          
        }
        catch(\PDOException $e)
        {
            $mensaje['mensaje'] = "UPS! ERROR PDO: " . $e->getMessage() . "| CODE: " . $e->getCode();
            $mensaje['tipo'] = "danger";
        }
        catch(\Exception $e){
            $mensaje['mensaje'] = "UPS! ERROR EXCEPTION: " . $e->getMessage() . "| CODE: " . $e->getCode();
            $mensaje['tipo'] = "danger";
        }
        

        

        $searchedEvent = $this->eventDao->read($id_event); // evento buscado


        include URL_VIEW . 'header.php';
        require(URL_VIEW . "viewEvent/updateEvent.php");
        include URL_VIEW . 'footer.php';        

    }

    public function updateView($id) 
    {
        $searchedEvent = $this->eventDao->read($id); // evento buscado


        include URL_VIEW . 'header.php';
        require(URL_VIEW . "viewEvent/updateEvent.php");
        include URL_VIEW . 'footer.php';
    }
}
