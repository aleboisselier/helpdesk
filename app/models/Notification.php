<?php
/**
 * Représente un ticket
 * @author aleboisselier
 * @version 1.0
 * @package helpdesk.models
 */
class Notification extends Base{

	/**
	 * @ManyToOne
	 * @JoinColumn(name="idTicket",className="Ticket",nullable=false)
	 */
	private $ticket;

	/**
	 * @ManyToOne
	 * @JoinColumn(name="idUser",className="User",nullable=false)
	 */
	private $user;

	/**
	 * @ManyToOne
	 * @JoinColumn(name="idMessage",className="Message",nullable=true)
	 */
	private $message;

	public function getTicket(){
		return $this->ticket;
	}

	public function setTicket($ticket) {
		$this->ticket=$ticket;
		return $this;
	}

	public function getUser() {
		return $this->user;
	}

	public function setUser($user) {
		$this->user=$user;
		return $this;
	}

		public function getMessage() {
		return $this->message;
	}

	public function setMessage($message) {
		$this->message=$message;
		return $this;
	}

	public function toString(){
		return "Nouveau message sur le Ticket : ".$this->ticket->getTitre();
	}
}