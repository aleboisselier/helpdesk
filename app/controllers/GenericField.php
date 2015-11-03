<?php
use micro\orm\DAO;
use micro\views\Gui;
/**
 * Gestion des catégories
 * @author jcheron
 * @version 1.1
 * @package helpdesk.controllers
 */
class Genericfield extends \_DefaultController {

	public function GenericField(){
		parent::__construct();
		$this->title="Ajout d'un champs";
		$this->model="genericField";
	}
	
	public function isValid() {
		return Auth::isAuth() && Auth::isAdmin();
	}

	public function frm($message=NULL){
		$object=$this->getInstance($id);
		$genericField=DAO::getAll("genericfield");
		echo $genericField->getLibelle();
	}

	/* (non-PHPdoc)
	 * @see _DefaultController::setValuesToObject()
	 */
	protected function setValuesToObject(&$object) {
		parent::setValuesToObject($object);

	}

}