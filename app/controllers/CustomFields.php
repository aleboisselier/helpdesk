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
		if (isset($_POST['idField']) && $_POST['idField'] !="Sélectionner un champ...") {
			$selectField=DAO::getOne("GenericField", $_POST['idField']);
			echo '<form action="CustomFields/ajout" method="post" name="ajoutForm" id="ajoutForm">
				<br>
				<label for="titre">Ajout d\'un titre pour"'.$selectField->getLibelle().'"  :</label><br>	
				<input type="text" name="titre"><br>';
			if($selectField->getMultiple()==1){
				$this->multipleField();
			}
			echo '<button type="submit">Ajouter</button>
				</select>';
		}
	}

	public function multipleField(){
		$this->loadView("customField/vAdd", array("test"=>$test));
		echo Jquery::executeOn(".ajoutItem","click", "$('.addNewItem').load('customField/vAdd')");
	}

	protected function setValuesToObject(&$object) {
		parent::setValuesToObject($object);

	}
}