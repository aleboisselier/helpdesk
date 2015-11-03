<?php
use micro\orm\DAO;
use micro\views\Gui;
use micro\js\Jquery;
/**
 * Gestion des catégories
 * @author jcheron
 * @version 1.1
 * @package helpdesk.controllers
 */
class GenericFields extends \_DefaultController {

	public function GenericFields(){
		parent::__construct();
		$this->title="Ajout d'un champs";
		$this->model="GenericField";
	}
	
	// public function isValid() {
	// 	return Auth::isAuth() && Auth::isAdmin();
	// }

	public function frm($message=NULL){
		$genericField=DAO::getAll("GenericField");
	}

	/* (non-PHPdoc)
	 * @see _DefaultController::setValuesToObject()
	 */
	protected function setValuesToObject(&$object) {
		parent::setValuesToObject($object);

	}

}