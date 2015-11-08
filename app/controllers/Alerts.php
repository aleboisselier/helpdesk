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
	
	protected function setValuesToObject(&$object){
		parent::setValuesToObject($object);
		$object->setUser(DAO::getOne("User", $_POST['idUser']));
		if(isset($_POST['enabled'])){
			if (isset($_POST['frequence'])){
				$i = 0;
				$array = array();
				$freq= $_POST['frequence'];
				foreach ($freq as $f){
					array_push($array, array("day" => $f, "time"=>$_POST['time']));
					$i++;
				}
				$object->setFrequence(json_encode($array));
			}
			$object->setEnabled(1);
		}else{
			$object->setEnabled(0);
		}
	}

}