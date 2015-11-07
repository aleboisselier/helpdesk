<?php
use micro\orm\DAO;
use micro\views\Gui;
use micro\js\Jquery;
/**
 * Gestion des champs
 * @author nbrossault
 * @version 1.1
 * @package helpdesk.controllers
 */
class CustomFields extends \_DefaultController {

	public function CustomFields(){
		parent::__construct();
		$this->title="Ajout d'un champ";
		$this->model="CustomField";
	}
	
	public function isValid() {
		return Auth::isAuth() && Auth::isAdmin();
	}

	public function index($id=NULL){
		$select=$this->getInstance($id);
		$genericFields=DAO::getAll("GenericField");
		$fieldList = Gui::select($genericFields, null, "Sélectionner un champ...");
		$this->loadView("customField/vSelect", array("fieldList"=>$fieldList));
		echo Jquery::postFormOn('change', '.select', "CustomFields/filter", "selectFieldForm", ".selectedField");
	}

	public function filter(){
		if (isset($_POST['idField']) && $_POST['idField'] !="Sélectionner un nouveau champ ...") {
			$selectField=DAO::getOne("GenericField", $_POST['idField']);
			echo "<".$selectField->getBaseHtml()." ".$selectField->getPropriete()." >";
		}
		
		//$this->loadView("customField/vSelect", array("genericFields"=>$genericFields, "selectField"=>$selectField, "sql"=>$sql));
		// $this->loadView("customField/vSelect", array("sql"=>$sql, "newField"=>$newField));
	}

	protected function setValuesToObject(&$object) {
		parent::setValuesToObject($object);

	}
}