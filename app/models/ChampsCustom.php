<?php
/**
 * Représente un champs custom
 * @author nBrossault
 * @version 1.1
 * @package helpdesk.models
 */
class champsCustom extends Base{
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

    public function getPropriete()
    {
        return $this->propriete;
    }
    private function setPropriete($propriete)
    {
        $this->propriete = $propriete;

        return $this;
    }

    public function getBaseHtml()
    {
        return $this->baseHtml;
    }
    private function setBaseHtml($baseHtml)
    {
        $this->baseHtml = $baseHtml;

        return $this;
    }

	public function toString(){
		$parent="";
		if(isset($this->champsCustom))
			$parent=" (".$this->champsCustom.")";
		return $this->libelle.$parent;
	}
}