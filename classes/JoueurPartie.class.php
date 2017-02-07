<?php 

class JoueurPartie {
	
	private $idPartie;
	private $idJoueur;
	
	public function __construct($valeurs = array()){
        if(!empty($valeurs)){
            $this->affecte($valeurs);
        }
    }

    public function affecte($tab = array()){
		foreach($tab as $val => $valeurs){
			switch ($val){
				case "id" : $this->setIdPartie($valeurs);
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
	
	public function getIdPartie(){
		return $this->idPartie;
	}
	
	//**********************************SETTERS**************************
    public function setIdJoueur($id){
        $this->idJoueur = $idJoueur;
    }
	
	public function setIdPartie($idPartie){
        $this->idPartie = $idPartie;
    }
}