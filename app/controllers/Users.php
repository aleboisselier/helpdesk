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

	public function index(){
		if(Auth::isAdmin()){
			$users=DAO::getAll("User");
			$this->loadView("user/vList",array("users"=>$users));
		}else{
			$user=DAO::getOne("user",$id=Auth::getUser()->getId());
			$this->loadView("user/vAdd",array("user"=>$user));
		}		
	}

	public function frm($id=NULL){
		if(Auth::isAdmin()){
			$user=$this->getInstance($id);
			$this->loadView("user/vAdd",array("user"=>$user));
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
	}

	public function tickets(){
		$this->forward("tickets");
	}
}