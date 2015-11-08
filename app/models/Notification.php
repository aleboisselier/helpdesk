<?php
/**
 * Représente un ticket
 * @author aleboisselier
 * @version 1.0
 * @package helpdesk.models
 */
class Notification extends Base{

	/**
	 * @Id
	 */
	private $idTicket;

	/**
	 * @Id
	 */
	private $idUser;

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

	private $date;
	private $mailSent;

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
		public function getIdTicket(){
		return $this->idTicket;
	}

	public function setIdTicket($ticket) {
		$this->idTicket=$ticket;
		return $this;
	}

	public function getIdUser() {
		return $this->idUser;
	}

	public function setIdUser($user) {
		$this->idUser=$user;
		return $this;
	}

	public function getDate(){
		return $this->date;
	}

	public function setDate($date){
		$this->date=$date;
		return $this;
	}

    /**
     * mailSent
     * @return unkown
     */
    public function getMailSent(){
        return $this->mailSent;
    }

    /**
     * mailSent
     * @param unkown $mailSent
     * @return Notification
     */
    public function setMailSent($mailSent){
        $this->mailSent = $mailSent;
        return $this;
    }

}