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
		$this->title="Catégories";
		$this->model="Categorie";
	}

	public function frm($id=NULL){
		$object=$this->getInstance($id);
		$categories=DAO::getAll("Categorie");
		$idParent=-1;
		if(null!==$object->getCategorie()){
			$idParent=$object->getCategorie()->getId();
		}
		$list=Gui::select($categories,$idParent,"Sélectionner une catégorie parente...");
		$this->loadView("categorie/vAdd",array("select"=>$list,"categorie"=>$object));
	}

	/* (non-PHPdoc)
	 * @see _DefaultController::setValuesToObject()
	 */
	protected function setValuesToObject(&$object) {
		parent::setValuesToObject($object);
		if(isset($_POST["idCategorie"])){
			$parent=DAO::getOne("Categorie", $_POST["idCategorie"]);
			$object->setCategorie($parent);
		}

	}

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
}