<?php

/**
 * Gestion des catégories
 * @author aleboisselier
 * @version 1.1
 * @package helpdesk.controllers
 */
class Groupes extends \_DefaultController {

	public function Groupes(){
		parent::__construct();
		$this->title="Groupes";
		$this->model="Groupe";
	}


	public function isValid() {
		return Auth::isAuth() && Auth::isAdmin();
	}

	public function frm($id=NULL){
		$object=$this->getInstance($id);
		$this->loadView("groupe/vAdd",array("groupe"=>$object));
	}

}