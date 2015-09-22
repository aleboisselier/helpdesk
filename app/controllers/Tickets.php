<?php

use micro\orm\DAO;
use micro\js\Jquery;
use micro\views\Gui;
use micro\utils\RequestUtils;
/**
 * Gestion des tickets
 * @author jcheron
 * @version 1.1
 * @package helpdesk.controllers
 */
class Tickets extends \_DefaultController {
	public function Tickets(){
		parent::__construct();
		$this->title="Tickets";
		$this->model="Ticket";
	}

	public function index($message=null){
		global $config;
		$baseHref=get_class($this);
		if(isset($message)){
			if(is_string($message)){
				$message=new DisplayedMessage($message);
			}
			$message->setTimerInterval($this->messageTimerInterval);
			$this->_showDisplayedMessage($message);
		}
		$objects=DAO::getAll($this->model);

		$this->loadView("ticket/vList", array("listName" => "Nouveaux", "tickets" => $objects));
	}


	public function messages($id){
		$ticket=DAO::getOne("Ticket", $id[0]);
		if($ticket!=NULL){
			echo "<h2>".$ticket."</h2>";
			$messages=DAO::getOneToMany($ticket, "messages");
			echo "<table class='table table-striped'>";
			echo "<thead><tr><th>Messages</th></tr></thead>";
			echo "<tbody>";
			foreach ($messages as $msg){
				echo "<tr>";
				echo "<td title='message' data-content='".htmlentities($msg->getContenu())."' data-container='body' data-toggle='popover' data-placement='bottom'>".$msg->toString()."</td>";
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";
			echo Jquery::execute("$(function () {
					  $('[data-toggle=\"popover\"]').popover({'trigger':'hover','html':true})
				})");
		}
	}

	public function frm($id=NULL){
		$ticket=$this->getInstance($id);
		DAO::getOneToMany($ticket,"messages");
		$messages=$ticket->getMessages();

		$categories=DAO::getAll("Categorie");
		if($ticket->getCategorie()==null){
			$cat=-1;
		}else{
			$cat=$ticket->getCategorie()->getId();
		}
		$listCat=Gui::select($categories,$cat,"Sélectionner une catégorie ...");
		$listType=Gui::select(array("demande","incident"),$ticket->getType(),"Sélectionner un type ...");

		$this->loadView("ticket/vAdd",array("ticket"=>$ticket,"listCat"=>$listCat,"listType"=>$listType));
		$this->loadView("ticket/vInfoTicket",array("ticket"=>$ticket,"listCat"=>$listCat,"listType"=>$listType));
		
		echo "<div class='container contentMessages'>";
		$this->loadView("ticket/vMessage",array("messages"=>$messages, "ticket" => $ticket));
		echo Jquery::executeOn('.submitMessage', "click", "
			for ( instance in CKEDITOR.instances )
        		CKEDITOR.instances[instance].updateElement();
		");
		echo Jquery::postFormOn("click",".submitMessage","messages/update","frm",".contentMessages");

		echo Jquery::execute("$('.infoTicket').hide();");
		echo "</div>";
		
		echo Jquery::executeOn(".montreInfoTicket","click", 
				"$('.montreInfoTicket').toggleClass('glyphicon-chevron-up');
				$('.montreInfoTicket').toggleClass('glyphicon-chevron-down');
				$('.infoTicket').slideToggle('slow');");
	}

	public function addMessage(){
		echo "test";
		$message= new Message();

		// $messages=$ticket->getMessages();
		// $this->loadView("ticket/vMessage",array("messages"=>$messages));
	}

	/* (non-PHPdoc)
	 * @see _DefaultController::setValuesToObject()
	 */
	protected function setValuesToObject(&$object) {
		parent::setValuesToObject($object);
		$categorie=DAO::getOne("Categorie", $_POST["idCategorie"]);
		$object->setCategorie($categorie);
		$statut=DAO::getOne("Statut", $_POST["idStatut"]);
		$object->setStatut($statut);
		$user=DAO::getOne("User", $_POST["idUser"]);
		$object->setUser($user);
	}

	/* (non-PHPdoc)
	 * @see _DefaultController::getInstance()
	 */
	public function getInstance($id = NULL) {
		$obj=parent::getInstance($id);
		if(null==$obj->getType())
			$obj->setType("intervention");
		if($obj->getStatut()===NULL){
			$statut=DAO::getOne("Statut", 1);
			$obj->setStatut($statut);
		}
		if($obj->getUser()===NULL){
			$obj->setUser(Auth::getUser());
		}
		if($obj->getDateCreation()===NULL){
			$obj->setdateCreation(date('Y-m-d H:i:s'));
		}
		return $obj;
	}


	/* (non-PHPdoc)
	 * @see BaseController::isValid()
	 */
	public function isValid() {
		return Auth::isAuth();
	}

	/* (non-PHPdoc)
	 * @see BaseController::onInvalidControl()
	 */
	public function onInvalidControl() {
		$this->initialize();
		$this->messageDanger("<strong>Autorisation refusée</strong>,<br>Merci de vous connecter pour accéder à ce module.&nbsp;".Auth::getInfoUser("danger"));
		$this->finalize();
		exit;
	}



}