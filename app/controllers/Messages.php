<?php
/**
 * Gestion des messages
 * @author jcheron
 * @version 1.1
 * @package helpdesk.controllers
 */

use micro\orm\DAO;

class Messages extends \_DefaultController {
	public function Messages(){
		parent::__construct();
		$this->title="Messages";
		$this->model="Message";
	}
	public function frm($id = NULL){
		$message=$this->getInstance($id);
		if(isset($id)){
			$idTicket=$message->getTicket()->getId();
		}else{
			$id=-1;
		}

		$tickets=DAO::getAll("ticket");
		$this->loadView("message/vAdd", array("message"=>$message, "tickets"=>$tickets,"idTicket"=>$idTicket));
	}

	protected function setValuesToObject(&$object){
		parent::setValuesToObject($object);
		$ticket=DAO::getOne("ticket", $_POST["idTicket"]);
		$object->setTicket($ticket);
		$object->setUser($_SESSION["user"]);
	}

	public function update(){
		parent::update();
		// DAO::getAll("Message", 'idTicket = '.$_POST['idTicket']);
		// $this->loadView("ticket/vMessage",array("messages"=>$messages));
	}

	public function isValid(){
		return Auth::isAuth();
		// codeintel
	}

	public function onInvalidControl(){
		$this->initialize();
		$this->messageWarning("Vous devez vous connecter !");
		$this->finalize();
		exit;
	}
}