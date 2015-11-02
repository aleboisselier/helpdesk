<?php
use micro\orm\DAO;
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
		$this->loadView("main/vHeader",array("infoUser"=>Auth::getInfoUser()));
		
		$message = null;
		if (isset($_SESSION['logStatus'])){
			switch ($_SESSION['logStatus']) {
				case 'fail':
					$message = $this->_showMessage("ERREUR : Couple identifiant/mot de passe inconnu.", "danger");
					break;
				case 'disconnected':
					$message = $this->_showMessage("Vous avez été correctement déconnecté. <b>Au revoir...</b>", "success");
					break;
				case 'success':
					$message = $this->_showMessage("Bienvenue ".Auth::getUser()->getLogin().".", "success");
					break;
				default:
					$message = null;
					break;
			}
			$_SESSION['logStatus'] = null;
		}

		if(Auth::isAuth()){
			$notifs = DAO::getAll("Notification", "idUser = ".Auth::getUser()->getId());
			$this->loadView("main/vDefault", array("notifs" => $notifs, "message"=>$message));

		}else{
			$this->loadView("main/vLogin");
		}

		$this->loadView("main/vFooter");
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
		if (isset($_COOKIE['user'])){
            setcookie('user', '', time()-60*60*24*90, '/', '', 0, 0);
            unset($_COOKIE['user']);
        }
		$this->index();
	}

	protected function _showMessage($message,$type="success",$timerInterval=0,$dismissable=true,$visible=true){
		$this->loadView("main/vInfo",array("message"=>$message,"type"=>$type,"dismissable"=>$dismissable,"timerInterval"=>$timerInterval,"visible"=>$visible));
	}

	public function login(){
		global $config;
		if (isset($_POST["email"]) && isset($_POST['pass'])) {
			$user = DAO::getOne("User", "mail='".$_POST["email"]."'");
			if (password_verify($_POST['pass'], $user->getPassword())) {
				$_SESSION["user"] = $user;
				$_SESSION['KCFINDER'] = array(
					'disabled' => true
				);
				$_SESSION['logStatus'] = 'success';

				if (isset($_POST['remember'])) {
					setcookie('user', $user->getId(), $config['cookies']['user']['lifetime']);
				}

			}else{
				$_SESSION['logStatus'] = 'fail';
			}
		}

		$this->forward("Indexx");
	}

		/**
	 * Connecte le premier administrateur trouvé dans la BDD
	 */
	public function asAdmin(){
		global $config;
		$_SESSION["user"]=DAO::getOne("User", "admin=1");
		$_SESSION['KCFINDER'] = array(
				'disabled' => false
		);
		$_SESSION['logStatus'] = 'success';
		setcookie('user', $_SESSION["user"]->getId(), $config['cookies']['user']['lifetime']);
		$this->index();
	}

	/**
	 * Connecte le premier utilisateur (non admin) trouvé dans la BDD
	 */
	public function asUser(){
		global $config;
		$_SESSION["user"]=DAO::getOne("User", "admin=0");
		$_SESSION['KCFINDER'] = array(
				'disabled' => true
		);
		$_SESSION['logStatus'] = 'success';
		setcookie('user', $_SESSION["user"]->getId(), $config['cookies']['user']['lifetime']);
		$this->index();
	}

}