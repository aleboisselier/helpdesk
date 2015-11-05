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
		$this->title="Ajout d'un champ";
		$this->model="GenericField";
	}
	
	public function isValid() {
		return Auth::isAuth() && Auth::isAdmin();
	}

	public function index($id=NULL){
		$select=$this->getInstance($id);
		$genericFields=DAO::getAll("GenericField");
		if($select->getLibelle()==null){
			$champ=-1;
		}else{
			$champ=$select->getLibelle()->getId();
		}
		$listGenericField=Gui::select($genericFields,$champ,"Sélectionner un champ ...");
		// $this->loadView("genericField/vSelect", array("genericFields"=>$genericFields));
		// if(){};
	}

	protected function setValuesToObject(&$object) {
		parent::setValuesToObject($object);

	}
}