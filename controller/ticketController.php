<?php

namespace controller;

use model\Ticket as Ticket;
use dao\TicketDAO as TicketDAO;
use controller\Controller as Controller;
use interfaces\IAlmr as IAlmr;

class TicketController extends Controller implements IAlmr
{
    private $controllerDao;

    public function __construct () {
        parent::__construct();
        $this->controllerDao = TicketDAO::getInstance();
    }

    public function index () {
        $this->list();
    }

    public function add ($data = []) {
        //create -> La llave es el campo en la base de dato y el valor es el valor a guardar en la base de datos
        $this->controllerDao->create([
          "id_line_purchase" => $data["idLinePurchase"],
          "code_qr" => $data["codeQr"]
        ]);

        $this->redirect("/linePurchase/");

        return;
    }

    public function list () {
		if ( ! $this->isLogged()) {
			$this->redirect('/default/login');
		}
		else {

			$items = $this->controllerDao->readAll();

      $items = $this->controllerDao->mapMethodCollection($items);

			$this->render("viewTicket/createTicket",[
				'items' => $items
			]);
		}
    }

    public function remove($data = []) {

		$this->controllerDao->delete([
      "id_ticket_number" => $data['idTicket']
    ]);

		$this->redirect("/ticket/");
	}

	public function viewEdit ($id) {

		$searchedItem = $this->controllerDao->read([
      "id_ticket_number" => $id
    ]);

    $searchedItem = $this->controllerDao->mapMethod($searchedItem);

		$this->render('viewEventArea/updateTicket',[
			'searchedItem' => $searchedItem
		]);
	}

  public function modify($data = [])
	{
		if ( ! $this->isMethod("POST")) $this->redirect("/default/");
		if (empty($data)) $this->redirect("/default/");

		try
		{
			$this->controllerDao->update([
        "id_line_purchase" => $data["idLinePurchase"],
        "code_qr" => $data["codeQr"]
      ],[
        "id_ticket_number" => $data["idTicket"]
      ]);
		}
		catch(\PDOException $e)
		{
			echo $e->getMessage();
		}
		catch(\Exception $e){
			echo $e->getMessage();
		}

		$this->redirect('/ticket/');

	}

} //<------ en CLASS
