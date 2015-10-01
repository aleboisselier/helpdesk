<?php
/**
 * Représente un statut
 * @author jcheron
 * @version 1.1
 * @package helpdesk.models
 */
class Statut extends Base{
	/**
	 * @Id
	 */
	private $id;
	private $libelle;
	private $ordre=0;
	private $icon;
	private $statutsSuivant;
	private $action;
	private $cssClass;

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

	public function getOrdre() {
		return $this->ordre;
	}

	public function setOrdre($ordre) {
		$this->ordre=$ordre;
		return $this;
	}

	public function toString(){
		return "<span class='glyphicon glyphicon-".$this->icon."' aria-hidden='true'></span>&nbsp;".$this->libelle;
	}

	public function getIcon() {
		return $this->icon;
	}

	public function setIcon($icon) {
		$this->icon=$icon;
		return $this;
	}

	public function getStatutsSuivant(){
		return $this->statutsSuivant;
	}

	public function setStatutsSuivant($statuts){
		$this->statutsSuivant = $statuts;
		return $this;
	}

	public function getAction(){
		return $this->action;
	}

	public function setAction($action){
		$this->action = $action;
		return $this;
	}

	public function getCssClass(){
		return $this->cssClass;
	}

	public function setCssClass($cssClass){
		$this->cssClass = $cssClass;
		return $this;
	}

}