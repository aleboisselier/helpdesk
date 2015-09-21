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
		$faqs=DAO::getAll($this->model);
		$this->loadView("faq/vFilter");
		$this->loadView("faq/vList", array("faqs"=>$faqs));
		echo Jquery::postFormOn('click', '#search', "faqs/filter", "searchForm", ".list");
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
		if (isset($_POST['categorie'])) {
			if ($sql != "") {
				$sql += " AND ";
			}
				$sql += "idCategorie = ".$_POST['categorie'];
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