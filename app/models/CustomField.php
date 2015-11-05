<?php
/**
 * Represente l'ajout d'un champs personnalisé
 * @author nbrossault
 * @version 1.1
 * @package helpdesk.controllers
 */
class CustomField extends Base{
	/**
	 * @Id
	 */
	private $id;
	private $libelle;
	private $propriete;
	private $baseHtml;

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

    public function getPropriete(){
        return $this->propriete;
    }
    public function setPropriete($propriete){
        $this->propriete=$propriete;
        return $this;
    }

    public function getBaseHtml(){
        return $this->baseHtml;
    }
    public function setBaseHtml($baseHtml){
        $this->baseHtml=$baseHtml;
		return $this;
    }

	public function toString(){
		$parent="";
		if(isset($this->genericfield))
			$parent=" (".$this->genericfield.")";
		return $this->libelle.$parent;
	}
}