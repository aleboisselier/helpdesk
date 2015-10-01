<?php
use micro\orm\DAO;
use micro\js\Jquery;
use micro\views\Gui;
/**
 * Gestion des tickets
 * @author ALeboisselier
 * @version 1.1
 * @package helpdesk.controllers
 */
class Indexx extends micro\controllers\BaseController {
	public function Indexx(){
		parent::__construct();
	}

	/**
	 * Affiche la page par défaut du site
	 * @see BaseController::index()
	 */
	public function index() {
		if(!isset($_SESSION['logStatus']))
			$_SESSION['logStatus'] = null;

		$this->loadView("main/vHeader",array("infoUser"=>Auth::getInfoUser()));
		if(Auth::isAuth()){

			$notifs = DAO::getAll("Notification", "idUser = ".Auth::getUser()->getId());
			$this->loadView("main/vDefault", array("notifs" => $notifs));

		}else{
			$this->loadView("main/vLogin");
		}
		$this->loadView("main/vFooter");
		Jquery::getOn("click", ".btAjax", "sample/ajaxSample","#response");
		echo Jquery::compile();
	}

	/**
	 * Déconnecte l'utilisateur actuel
	 */
	public function disconnect(){
		$_SESSION = array();
		$_SESSION['KCFINDER'] = array(
				'disabled' => true
		);
		$_SESSION['logStatus'] = 'disconnected';
		$this->index();
	}

	public function _showMessage($message,$type="success",$timerInterval=0,$dismissable=true,$visible=true){
		$this->loadView("main/vInfo",array("message"=>$message,"type"=>$type,"dismissable"=>$dismissable,"timerInterval"=>$timerInterval,"visible"=>$visible));
	}

	public function login(){
		if (isset($_POST["email"]) && isset($_POST['pass'])) {
			$user = DAO::getOne("User", "mail='".$_POST["email"]."' AND password='".$_POST['pass']."'");
			if ($user != null) {
				$_SESSION["user"] = $user;
				$_SESSION['KCFINDER'] = array(
					'disabled' => true
				);
				$_SESSION['logStatus'] = 'success';
			}else{
				$_SESSION['logStatus'] = 'fail';
			}
		}

		$this->index();
	}

		/**
	 * Connecte le premier administrateur trouvé dans la BDD
	 */
	public function asAdmin(){
		$_SESSION["user"]=DAO::getOne("User", "admin=1");
		$_SESSION['KCFINDER'] = array(
				'disabled' => false
		);
		$_SESSION['logStatus'] = 'success';
		$this->index();
	}

	/**
	 * Connecte le premier utilisateur (non admin) trouvé dans la BDD
	 */
	public function asUser(){
		$_SESSION["user"]=DAO::getOne("User", "admin=0");
		$_SESSION['KCFINDER'] = array(
				'disabled' => true
		);
		$_SESSION['logStatus'] = 'success';
		$this->index();
	}



}