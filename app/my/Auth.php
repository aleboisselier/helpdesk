<?php
use micro\orm\DAO;

/**
 * Classe de gestion de l'authentification
 * @author jcheron
 * @version 1.1
 * @package helpdesk.my
 */
class Auth {
	/**
	 * Retourne l'utilisateur actuellement connecté<br>
	 * ou NULL si personne ne l'est
	 * @return User
	 */
	public static function getUser(){
		global $config;

		$user=null;
		if(array_key_exists("user", $_SESSION)){
			$user=$_SESSION["user"];
		}else if (isset($_COOKIE)) {
			if (array_key_exists("user", $_COOKIE)) {
				$_SESSION["user"] = DAO::getOne('User', 'id='.$_COOKIE['user']);
				$user=$_SESSION["user"];
				setcookie('user', $_COOKIE['user'], $config['cookies']['user']['lifetime']);
			}
		}
		return $user;
	}

	/**
	 * Retourne vrai si un utilisateur est connecté
	 * @return boolean
	 */
	public static function isAuth(){
		return null!==self::getUser();
	}

	/**
	 * Retourne vrai si un utilisateur de type administrateur est connecté<br>
	 * Faux si l'utilisateur connecté n'est pas admin ou si personne n'est connecté
	 * @return boolean
	 */
	public static function isAdmin(){
		$user=self::getUser();
		if($user instanceof User){
			return $user->getAdmin();
		}else{
			return false;
		}
	}

	/**
	 * Retourne la zone d'information au format HTML affichant l'utilisateur connecté<br>
	 * ou les boutons de connexion si personne n'est connecté
	 * @return string
	 */
	public static function getInfoUser($style="primary"){
		$user=self::getUser();
		if(isset($user)){
			$infoUser="<a class='btn btn-primary' href='indexx/disconnect'>Déconnexion <span class='label label-success'>".$user."</span></a>";
		}else{
			$infoUser='<a href="Indexx/index" class="btn btn-'.$style.'">Se Connecter</a>';
		}
		return $infoUser;
	}
}