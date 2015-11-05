<?php
use micro\orm\DAO;
use micro\views\Gui;
use micro\js\Jquery;
/**
 * Gestion des catégories
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
		if($select->getLibelle()==null){
			$libelle=-1;
		}else{
			$libelle=$select->getLibelle()->getId();
		}
		// $listGenericField=Gui::select($genericFields,$libelle,"Sélectionner un nouveau champ ...");
		// $this->loadView("customField/vSelect", array("listGenericField"=>$listGenericField));
		$this->loadView("customField/vSelect", array("genericFields"=>$genericFields));

		// echo Jquery::postFormOn('prepend', '.select', "CustomFields/filter", "selectFieldForm", ".selectedField");
	}

	public function filter(){
		echo "<br> pouet : ".$pouet="pouet";
		echo "<br> idField : ".$_POST['idField']."<br>";
		$sql = "";
		if (isset($_POST['idField']) && $_POST['idField'] !="Sélectionner un nouveau champ ...") {
			$sql = "idGenericField = ".$_POST['idField'];
		}
		echo $selectField=DAO::getAll("GenericField", $sql);

		// $this->loadView("customField/vSelect", array("pouet"=>$pouet));
		$this->loadView("customField/vSelect", array("selectField"=>$selectField, "sql"=>$sql, "pouet"=>$pouet));
	}

	protected function setValuesToObject(&$object) {
		parent::setValuesToObject($object);

	}
}