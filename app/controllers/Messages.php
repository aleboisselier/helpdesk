<?php
/**
 * Gestion des messages
 * @author jcheron
 * @version 1.1
 * @package helpdesk.controllers
 */
class Messages extends \_DefaultController {
	public function __construct(){
		parent::__construct();
		$this->title="Messages";
		$this->model="Message";
	}
}