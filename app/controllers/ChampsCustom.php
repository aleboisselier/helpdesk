<?php
use micro\orm\DAO;
use micro\views\Gui;
/**
 * Gestion des catégories
 * @author jcheron
 * @version 1.1
 * @package helpdesk.controllers
 */
class Categories extends \_DefaultController {

	public function Categories(){
		parent::__construct();
		$this->title="Ajout d'un champs";
		$this->model="ChampsCustom";
	}
	
	public function isValid() {
		return Auth::isAuth() && Auth::isAdmin();
	}

	public function frm($id=NULL){
		$object=$this->getInstance($id);
		$this->loadView("categorie/vAdd",array("select"=>$list,"categorie"=>$object));
	}

	/* (non-PHPdoc)
	 * @see _DefaultController::setValuesToObject()
	 */
	protected function setValuesToObject(&$object) {
		parent::setValuesToObject($object);

	}

}