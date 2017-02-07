<?php 

class Main {
	
	private $idCarte;
	private $idJoueur;
	
	public function __construct($valeurs = array()){
        if(!empty($valeurs)){
            $this->affecte($valeurs);
        }
    }

    public function affecte($tab = array()){
		foreach($tab as $val => $valeurs){
			switch ($val){
				case "id" : $this->setIdCarte($valeurs);
				break;
				case "pseudo": $this->setIdJoueur($valeurs);
				break;
			}
		}
	}
	
	//**********************************GETTERS**************************
	public function getIdJoueur(){
		return $this->idJoueur;
	}
	
	public function getIdCarte(){
		return $this->idCarte;
	}
	
	//**********************************SETTERS**************************
    public function setIdJoueur($id){
        $this->idJoueur = $idJoueur;
    }
	
	public function setIdCarte($idCarte){
        $this->idCarte = $idCarte;
    }
}