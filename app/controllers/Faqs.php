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
		echo "<table class='table table-striped'>";
		echo "<thead><tr><th>Questions</th></tr></thead>";
		echo "<tbody>";
		foreach ($faqs as $faq){
			echo "<tr>";
			echo "<td>".$faq->getTitre()."</td>";
			echo "<td class='td-center'><a class='btn btn-primary btn-xs' href='".$baseHref."/frm/".$faq->getId()."'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></td>".
			"<td class='td-center'><a class='btn btn-warning btn-xs' href='".$baseHref."/delete/".$faq->getId()."'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
		echo "<a class='btn btn-primary' href='".$config["siteUrl"].$baseHref."/frm'>Ajouter...</a>";
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