<?php
/**
 * Représente les alertes envoyés par mail
 * @author aleboisselier
 * @version 1.1
 * @package helpdesk.models
 */

class Alert extends Base{
	/**
	 * @Id
	 */
	private $id;
	
	/**
	 * @ManyToOne
	 * @JoinColumn(name="idUser",className="User",nullable=false)
	 */
	private $user;
	private $event;
	private $enabled;
	private $frequence;
	private $instant;


	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id=$id;
		return $this;
	}


	/* (non-PHPdoc)
	 * @see Base::toString()
	 */
	public function toString() {
		return $this->name;

	}

    /**
     * event
     * @return unkown
     */
    public function getEvent(){
        return $this->event;
    }

    /**
     * event
     * @param unkown $event
     * @return Alert
     */
    public function setEvent($event){
        $this->event = $event;
        return $this;
    }

    /**
     * enabled
     * @return unkown
     */
    public function getEnabled(){
        return $this->enabled;
    }

    /**
     * enabled
     * @param unkown $enabled
     * @return Alert
     */
    public function setEnabled($enabled){
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * frequence
     * @return unkown
     */
    public function getFrequence(){
        return $this->frequence;
    }

    /**
     * frequence
     * @param unkown $frequence
     * @return Alert
     */
    public function setFrequence($frequence){
        $this->frequence = $frequence;
        return $this;
    }


    /**
     * idUser
     * @return unkown
     */
    public function getUser(){
        return $this->user;
    }

    /**
     * idUser
     * @param unkown $idUser
     * @return Alert
     */
    public function setUser($idUser){
        $this->user = $idUser;
        return $this;
    }


    /**
     * instant
     * @return unkown
     */
    public function getInstant(){
        return $this->instant;
    }

    /**
     * instant
     * @param unkown $instant
     * @return Alert
     */
    public function setInstant($instant){
        $this->instant = $instant;
        return $this;
    }

}