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
	public function __construct(){
		parent::__construct();
		$this->title="<p style='margin-left:2%'>Foire aux Questions</p>";
		$this->model="Faq";
	}
	
 	public function isValid() {
		return Auth::isAuth();
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
			$faqs=DAO::getAll($this->model, "published = 1");
			$listUser=Gui::select($auteurs,null,"Sélectionner l'auteur...");
		}
		
		
		$listCategorie=Gui::select($categories,null,"Sélectionner une catégorie ...");
		
		$this->loadView("faq/vFilter",array("listCategorie"=>$listCategorie,"listUser"=>$listUser));
		echo "<div class='list'>";
		$this->loadView("faq/vList", array("faqs"=>$faqs));
		echo "</div>";

		echo JQuery::execute("$('[data-toggle=\"tooltip\"]').tooltip()");
		echo Jquery::postFormOn('change', '.search', "Faqs/filter", "searchForm", ".list");
		echo Jquery::postFormOn('keyup', '.search', "Faqs/filter", "searchForm", ".list");
		echo Jquery::getOn('click', '.suspend', 'Faqs/suspend', '.list');

	}

	public function view($id=NULL){
		$faq=$this->getInstance($id);
		if ($faq->getPublished() || $faq->getUser()->getId() == Auth::getUser()->getId()) {
			$faq->setUser(DAO::getAll("User", "id=".$faq->getUser()->getId())[0]);
			$this->loadView("faq/vView",array("faq"=>$faq));
		}else{
			$this->forward("Faqs/index");
		}
	}

	public function frm($id=NULL){
		global $config;

		$faq=$this->getInstance($id);
		$faq->setUser(DAO::getAll("User", "id=".$faq->getUser()->getId())[0]);

		$categories=DAO::getAll("Categorie");
		if($faq->getCategorie()==null){
			$cat=-1;
		}else{
			$cat=$faq->getCategorie()->getId();
		}
		$listCat=Gui::select($categories,$cat,"Sélectionner une catégorie ...");
	
		$this->loadView("faq/vAdd",array("faq"=>$faq,"listCat"=>$listCat));
		if(!$config["test"]) echo Jquery::execute("CKEDITOR.replace('contenu');");
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
		echo JQuery::execute("$('[data-toggle=\"tooltip\"]').tooltip()");
		echo Jquery::getOn('click', '.suspend', 'Faqs/suspend', '.list');
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
 	
 	public function suspend($params){
 		$params = explode(";", $params[0]);
 		$faq = DAO::getOne($this->model, $params[0]);
 		$faq->setPublished($params[1]);
 		DAO::update($faq);
 		echo "<div class='test'></div>";
 		echo Jquery::postForm('Faqs/filter', 'searchForm', '.list');
 		
 	}


}