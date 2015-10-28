<?php
/**
 * Représente un token de sécurité pour un utilisateur (provisoire)
 * @author aleboisselier
 * @version 1.1
 * @package helpdesk.models
 */
class Token extends Base{
	/**
	 * @Id
	 */
	private $token;
	/**
	 * @ManyToOne
	 * @JoinColumn(name="idUser",className="User",nullable=false)
	 */
	private $user;

	public function getToken() {
		return $this->token;
	}

	public function setToken($token) {
		$this->token=$token;
		return $this;
	}

	public function getUser() {
		return $this->user;
	}

	public function setUser($user) {
		$this->user=$user;
		return $this;
	}

	public function toString(){
		return $this->token;
	}

}