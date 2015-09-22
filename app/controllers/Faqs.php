<?php
use micro\orm\DAO;
use micro\views\Gui;
use micro\js\Jquery;
/**
 * Gestion des articles de la Faq
 * @author jcheron
 * @version 1.1
 * @package helpdesk.controllers
 */
class Faqs extends \_DefaultController {
	public function Faqs(){
		parent::__construct();
		$this->title="Foire aux Questions";
		$this->model="Faq";
	}

	public function index($message=null){
		global $config;
		$baseHref=get_class($this);
		if(isset($message)){
			if(is_string($message)){
				$message=new DisplayedMessage($message);
			}
			$message->setTimerInterval($this->messageTimerInterval);
			$this->_showDisplayedMessage($message);
		}

		$categories=DAO::getAll("Categorie");
		$auteurs=DAO::getAll("User");
		
		if (Auth::isAdmin()) {
			$faqs = DAO::getAll($this->model, "idUser=".Auth::getUser()->getId());
			$listUser=Gui::select($auteurs,Auth::getUser()->getId(),"Sélectionner l'auteur...");
		}else{
			$faqs=DAO::getAll($this->model);
			$listUser=Gui::select($auteurs,null,"Sélectionner l'auteur...");
		}
		
		
		$listCategorie=Gui::select($categories,null,"Sélectionner une catégorie ...");
		
		$this->loadView("faq/vFilter",array("listCategorie"=>$listCategorie,"listUser"=>$listUser));
		$this->loadView("faq/vList", array("faqs"=>$faqs));

		echo Jquery::postFormOn('change', '.search', "faqs/filter", "searchForm", ".list");
	}

	public function frm($id=NULL){
		$faq=$this->getInstance($id);
		$categories=DAO::getAll("Categorie");
		if($faq->getCategorie()==null){
			$cat=-1;
		}else{
			$cat=$faq->getCategorie()->getId();
		}
		$listCat=Gui::select($categories,$cat,"Sélectionner une catégorie ...");

		$this->loadView("faq/vAdd",array("faq"=>$faq,"listCat"=>$listCat));
		echo Jquery::execute("CKEDITOR.replace('description');");
	}

	public function filter(){
		$sql = "";
		if(isset($_POST['titre'])){
			$sql = "titre LIKE '%".$_POST['titre']."%'";
		}
		if (isset($_POST['idCategorie']) && $_POST['idCategorie'] !="Sélectionner une catégorie ...") {
			if ($sql != "") {
				$sql .= " AND ";
			}
			$sql .= "idCategorie = ".$_POST['idCategorie'];
		}
		if (isset($_POST['idUser']) && $_POST['idUser'] != "Sélectionner l'auteur...") {
			if ($sql != "") {
				$sql .= " AND ";
			}
				$sql .= "idUser = ".$_POST['idUser'];
		}
		$faqs=DAO::getAll($this->model, $sql);
		$this->loadView("faq/vList", array("faqs"=>$faqs, "sql"=> $sql));
	}

	/* (non-PHPdoc)
	 * @see _DefaultController::setValuesToObject()
	 */
	protected function setValuesToObject(&$object) {
		parent::setValuesToObject($object);
		$object->setUser(Auth::getUser());
		$categorie=DAO::getOne("Categorie", $_POST["idCategorie"]);
		$object->setCategorie($categorie);
	}
 

}