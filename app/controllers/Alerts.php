<?php
use micro\orm\DAO;
/**
 * Gestion des alertes
 * @author aleboisselier
 * @version 1.1
 * @package helpdesk.controllers
 */
class Alerts extends \_DefaultController {

	public function Alerts(){
		parent::__construct();
		$this->title="Alertes";
		$this->model="Alert";
	}


	public function isValid() {
		return Auth::isAuth();
	}
	
	
	public function index(){
		$alert = DAO::getOne("Alert", "idUser = ".Auth::getUser()->getId());
		if ($alert == null){
			$alert = new Alert();
			$alert->setUser(Auth::getUser());
		}
		$days = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
		
		$this->loadView("alert/vEdit", array('alert' => $alert, "days" => $days));

	}

}