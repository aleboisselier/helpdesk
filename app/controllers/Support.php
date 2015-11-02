<?php
use micro\orm\DAO;
use micro\js\Jquery;
/**
 * Gestion des tickets
 * @author ALeboisselier
 * @version 1.1
 * @package helpdesk.controllers
 */
class Support extends micro\controllers\BaseController {
	
	public function Support(){
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
		$this->loadView("pass/vLostPass");
		$this->loadView("main/vFooter");

		echo Jquery::postFormOn('click', '#submitLogin', "Support/sendRecoverMail", "'#loginForm'", "#answer");
	}

	public function sendRecoverMail(){
		global $config;
		$user = DAO::getOne("User", "mail = '".$_POST['email']."'");
		
		if ($user == null){
			return $this->_showMessage("Impossible de trouver un utilisateur correspondant à cet email : ".$_POST['email'], 'warning');
		}

		$token = new Token();
		$t = md5(uniqid(rand(), true));
		$token->setToken($t);
		$token->setUser($user);
		DAO::insert($token);
	
		$this->sendMail("<a href='".$config['siteUrl']."Support/resetPassword/".$t."'>Cliquez ici pour réintialiser votre mot de passe et en choisir un nouveau</a>", $user->getMail());
		
		return $this->_showMessage("Un mail vous a  été envoyé avec un lien permettant de réintialiser votre mot de passe...", 'success');
	}

	public function resetPassword($id){
		$token = DAO::getOne('Token', "token = '".$id[0]."'");
		
		if ($token == null) {
			$this->_showMessage("Impossible de réintialiser le mot de passe, le token n'est peut-être plus valide...", 'warning');
			return;
		}

		$_SESSION['resetPass'] = array('idUser' => $token->getUser()->getId(), "token" => $token->getToken());
		$this->loadView("main/vHeader",array("infoUser"=>Auth::getInfoUser()));
		$this->loadView("pass/vResetPass");
		$this->loadView("main/vFooter");
		echo Jquery::postFormOn('click', '#submitLogin', "Support/updatePass", "'#loginForm'", "#answer");

	}

	public function updatePass(){
		$user = DAO::getOne("User", "id = ".$_SESSION['resetPass']['idUser']);
		if ($_POST['pass'] == $_POST['pass']) {
			$user->setPassword(password_hash($_POST['pass'], PASSWORD_BCRYPT));
			DAO::update($user);
			
			$token = DAO::getOne('Token', $_SESSION['resetPass']['token']);
			DAO::delete($token);
			$_SESSION['resetPass'] = null;
			return $this->_showMessage("Votre mot de passe a été correctement modifié. ".Auth::getInfoUser(), 'success');
		}else{
			return $this->_showMessage("Mots de passe différents !", 'warning');
		}
	}

	protected function _showMessage($message,$type="success",$timerInterval=0,$dismissable=true,$visible=true){
		$this->loadView("main/vInfo",array("message"=>$message,"type"=>$type,"dismissable"=>$dismissable,"timerInterval"=>$timerInterval,"visible"=>$visible));
	}

	protected function sendMail($message, $to){
		global $config;
		require_once ROOT.'../vendor\phpmailer\phpmailer/PHPMailerAutoload.php';
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->SMTPDebug = 0;

		$mail->Host = $config['mails']['smtp'];
		$mail->Port = $config['mails']['port'];

		$mail->SMTPSecure = $config['mails']['secure'];
		$mail->SMTPAuth = $config['mails']['smtpAuth'];
		$mail->Username = $config['mails']['username'];
		$mail->Password = $config['mails']['password'];

		$mail->setFrom('no-reply@helpdesk.com', 'Support HelpDesk');
		$mail->addAddress($to);
		$mail->Subject = 'Réinitialisation de Mot de Passe';
		$mail->CharSet = 'UTF-8';
		$mail->msgHTML($message, dirname(__FILE__));

		if (!$mail->send()) {
		    return false;
		} else {
		    return true;
		}
	}


}