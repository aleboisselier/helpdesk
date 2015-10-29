<?php
/**
 * Représente un groupe d'utilisateurs
 * @author aleboisselier
 * @version 1.1
 * @package helpdesk.models
 */
class Groupe extends Base{
	/**
	 * @Id
	 */
	private $id;
	private $libelle;

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id=$id;
		return $this;
	}

	public function getLibelle() {
		return $this->libelle;
	}

	public function setLibelle($libelle) {
		$this->libelle=$libelle;
		return $this;
	}

	public function toString(){
		return $this->libelle;
	}

}