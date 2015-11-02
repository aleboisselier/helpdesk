<?php
/**
 * Gestion des catégories
* @author aleboisselier
* @version 1.1
* @package helpdesk.controllers
*/
class Tokens extends \_DefaultController {

	public function Tokens(){
		parent::__construct();
		$this->title="Tokens";
		$this->model="Token";
	}


	public function isValid() {
		return Auth::isAuth() && Auth::isAdmin();
	}

}