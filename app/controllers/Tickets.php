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
		global $config;
		$this->title="Tickets <a class='btn btn-primary' href='".$config['siteUrl']."tickets/frm' style='margin-left:2%;'>Ajouter...</a>";
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
		
		$_SESSION['page'] = 1;
		$_SESSION['nbPerPage'] = 3;

		if (Auth::isAdmin()) {
			$_SESSION['condition'] = 'idStatut = 1';

			$this->loadView("ticket/vAdmin", array('newTickets' => DAO::count("Ticket", $_SESSION['condition'])));

			$this->listTickets();
		}else{
			$_SESSION['condition'] = 'idUser = '.Auth::getUser()->getId();
			$this->loadView("ticket/vUser");
			$this->listTickets();
		}

		echo Jquery::executeOn('.link', 'click', '
				$(".link").parent().removeClass("active");
				$(this).parent().addClass("active")');
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
		if ($ticket->getTitre() != "") {
			$notif = DAO::getOne("Notification", 'idUser = '.Auth::getUser()->getId().' AND idTicket = '.$ticket->getId());
			if ($notif != null) {
				DAO::delete($notif);
			}
		}
		
		//recuperer les message associé au ticket
		DAO::getOneToMany($ticket,"messages");
		$messages=$ticket->getMessages();

		//recuperer la ou les catégorie(s) du ticket
		$categories=DAO::getAll("Categorie");
		if($ticket->getCategorie()==null){
			$cat=-1;
		}else{
			$cat=$ticket->getCategorie()->getId();
		}
		
		//permet la séléction d'une catégorie
		$listCat=Gui::select($categories,$cat,"Sélectionner une catégorie ...");
		$listType=Gui::select(array("demande","incident"),$ticket->getType(),"Sélectionner un type ...");

		//affiche la vue vAdd du ticket
		$this->loadView("ticket/vAdd",array("ticket"=>$ticket,"listCat"=>$listCat,"listType"=>$listType));
		//affiche la vue permettant l'affichage des information du ticket
		$this->loadView("ticket/vInfoTicket",array("ticket"=>$ticket,"listCat"=>$listCat,"listType"=>$listType));
		
		//div contenant les messages
		echo "<div class='container contentMessages'>";
		//charge les messages et les affiches
		$this->loadView("ticket/vMessage",array("messages"=>$messages, "ticket" => $ticket));
		//instancie CKEditor
		echo Jquery::executeOn('.submitMessage', "click", "
			for ( instance in CKEDITOR.instances )
        		CKEDITOR.instances[instance].updateElement();
		");
		//lors du clic sur le bouton submitMessage, éxécute l'update du message et l'affiche
		echo Jquery::postFormOn("click",".submitMessage","Messages/update","frm",".contentMessages");

		if($ticket->getTitre() != "") echo Jquery::execute("$('.panel-body.infoTicket').hide();");
		echo "</div>";
		
		echo Jquery::executeOn(".montreInfoTicket","click", 
				"$('.montreInfoTicket').toggleClass('glyphicon-chevron-up');
				$('.montreInfoTicket').toggleClass('glyphicon-chevron-down');
				$('.panel-body.infoTicket').slideToggle('slow');");
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

	public function listTickets(){
		$condition = $_SESSION['condition'];
		$tPerPage = $_SESSION['nbPerPage'];
		$page=$_SESSION['page'];
		$nbTickets = DAO::count($this->model, $condition);
		if ($condition == "") {
			$nCondition = "1 = 1";
		}else{
			$nCondition = $condition;
		}
		
		$min = (($page)*$tPerPage)-($tPerPage);
		$num = $tPerPage;
		if($min < 0){ 
			$min = 0;
		}
		$nCondition .= ' ORDER BY dateCreation ASC LIMIT '.$min.','. $num;
		$list=DAO::getAll($this->model, $nCondition);
		$buttons = array();
		foreach ($list as $ticket) {
			$buttons[$ticket->getId()] = $this->getButtonGroup($ticket);
		}
		$this->loadView("ticket/vList", array("tickets" => $list, "buttons" => $buttons, 'currPage' => $page, 'nbTickets' => $nbTickets));
		echo Jquery::getOn('click', '.chgList', 'Tickets/listFromJquery','#list');
		echo Jquery::getOn('click', '.updateStatut', 'Tickets/updateStatut', '#list');
	}

	public function getButtonGroup($ticket){
		$buttonGroup = "";
		$statutsSuivant = $ticket->getStatut()->getStatutsSuivant();
		$listStatutsSuivant = explode(",", $statutsSuivant);
		foreach ( $listStatutsSuivant as $statut) {
			if ($statut >0) {
				$statut = DAO::getOne("Statut", $statut);
				$buttonGroup .= "<button type='button' class='updateStatut btn btn-".$statut->getCssClass()."' id='".$statut->getId().";".$ticket->getId()."'>".$statut->getAction()."</button>";
			}
		}
		return $buttonGroup;
	}

	// public function listFromURL($params){
	// 	$this->listTickets($params[0], $params[1], $params[2]);
	// }

	public function listFromJquery($params){
		$params = explode(";", $params[0]);
		$page = $params[0];
		$tPerPage = $params[1];
		if (isset($params[2])) {
			switch ($params[2]) {
				case 'new':
					$_SESSION['condition'] = "idStatut = 1";
					break;
				case 'my':
					if (Auth::isAdmin()) {
						$_SESSION['condition'] = "idAdmin = ".Auth::getUser()->getId();
					}else{
						$_SESSION['condition'] = "idUser = ".Auth::getUser()->getId();
					}
					break;
				case 'closed' :
					if (Auth::isAdmin()) {
						$_SESSION['condition'] = "idStatut = 5";
					}else{
						$_SESSION['condition'] = "idUser = ".Auth::getUser()->getId()." AND idStatut = 5";
					}
					break;
				default:
					$_SESSION['condition'] = "";
					break;
			}
		}
		$_SESSION['page'] = $page;
		$_SESSION['nbPerPage'] = $tPerPage;
		$this->listTickets();
	}

	public function updateStatut($params){
		$params = explode(";", $params[0]);
		$statut = DAO::getOne("Statut", $params[0]);
		$ticket = DAO::getOne("Ticket", $params[1]);
		if ($statut->getId() == 2) {
			$ticket->setAdmin(Auth::getUser());
		}
		$ticket->setStatut($statut);

		if (DAO::update($ticket)) {
			$this->listTickets();
		}
	}
}