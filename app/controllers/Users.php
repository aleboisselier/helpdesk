<?php
use micro\orm\DAO;
use micro\views\Gui;
/**
 * Gestion des users
 * @author jcheron
 * @version 1.1
 * @package helpdesk.controllers
 */
class Users extends \_DefaultController {

	public function Users(){
		parent::__construct();
		$this->title="Utilisateurs";
		$this->model="User";
	}

	public function isValid() {
		return Auth::isAuth();
	}


	public function index(){
		if(Auth::isAdmin()){
			parent::index();
		}else{
			$this->frm(Auth::getUser()->getId());
		}		
	}

	public function frm($id=NULL){
		if(Auth::isAdmin() || ($id == Auth::getUser()->getId())){
			$user=$this->getInstance($id);
			$groups = DAO::getAll("Groupe");
			$listGrp=Gui::select($groups,$user->getGroupe()->getId(),"Sélectionner un Groupe ...");
			$this->loadView("user/vAdd",array("user"=>$user, "groups"=>$listGrp));
		}else{
			$this->forward("users");
		}
	}

	/* (non-PHPdoc)
	 * @see _DefaultController::setValuesToObject()
	 */
	protected function setValuesToObject(&$object) {
		parent::setValuesToObject($object);
		$object->setAdmin(isset($_POST["admin"]));
		$object->setGroupe(DAO::getOne("Groupe", "id=".$_POST['idGroupe']));
		if (isset($_POST["password"]) && isset($_POST["password2"])) {
			if ($_POST['password'] == $_POST['password2']) {
				$object->setPassword(password_hash($_POST['password'], PASSWORD_BCRYPT));
			}	
		}
	}

	public function tickets(){
		$this->forward("tickets");
	}


}