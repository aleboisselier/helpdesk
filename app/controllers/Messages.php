<?php
/**
 * Gestion des messages
 * @author jcheron
 * @version 1.1
 * @package helpdesk.controllers
 */

use micro\orm\DAO;
use micro\utils\RequestUtils;
use micro\js\Jquery;

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
		if(RequestUtils::isPost()){
			parent::updateNotForward();

			$ticket = DAO::getOne("Ticket",$_POST['idTicket']);
			$messages = DAO::getAll("Message", 'idTicket = '.$_POST['idTicket']);

			$users = array();
			foreach ($messages as $message) {
				$user = $message->getUser()->getId();
				if (!in_array($user, $users) && $user != Auth::getUser()->getId() ) {
					array_push($users, $message->getUser()->getId());
				}
			}

			foreach ($users as $user) {
				if (DAO::getOne("Notification", 'idUser = '.$user.' AND idTicket = '.$ticket->getId()) == null) {
					$user = DAO::getOne("User", $user);
					$notif = new Notification();
					// $message = DAO::getMax("Message", 'idUser = '.Auth::getUser()->getId());
					// $notif->setMessage($message);
					$notif->setUser($user);
					$notif->setTicket($ticket);
					DAO::insert($notif);
				}
			}


			$this->loadView("ticket/vMessage",array("messages"=>$messages, "ticket" => $ticket));
			Jquery::execute("CKEDITOR.replace('contenu');");
			Jquery::executeOn('.submitMessage', "click", "
			for ( instance in CKEDITOR.instances )
        		CKEDITOR.instances[instance].updateElement();
			");
			Jquery::postFormOn("click",".submitMessage","messages/update","frm",".contentMessages");
			echo Jquery::compile();
			
		}
	}

	public function isValid(){
		return Auth::isAuth();
	}

	public function onInvalidControl(){
		$this->initialize();
		$this->messageWarning("Vous devez vous connecter !");
		$this->finalize();
		exit;
	}
}