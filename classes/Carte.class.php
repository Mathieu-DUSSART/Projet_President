<?php
class Carte{
    private $idCarte;
    private $valeurCarte;

    public function __construct($valeurs = array()){
        if(!empty($valeurs)){
            $this->affecte($valeurs);
        }
    }

    public function affecte($tab = array()){
		foreach($tab as $id => $valeurs){
			switch ($id){
                case "carte_id" : $this->setIdCarte($valeurs);
                break;
                case "carte_valeur" : $this->setIdCarte($valeurs);
                break;
			}
		}
	}

    //**********************************SETTERS**************************
    public function setIdCarte($idCarte){
        $this->idCarte = $idCarte;
    }

    //**********************************GETTERS**************************
    public function getIdCarte(){
        return $this->idCarte;
    }
}
?>
