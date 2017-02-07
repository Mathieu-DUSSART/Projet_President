<?php 

class Main {
	
	private $idPartie;
	private $nomSalon;
	
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
				case "pseudo": $this->setNomSalon($valeurs);
				break;
			}
		}
	}
	
	//**********************************GETTERS**************************
	public function getNomSalon(){
		return $this->nomSalon;
	}
	
	public function getIdPartie(){
		return $this->idPartie;
	}
	
	//**********************************SETTERS**************************
    public function setIdJoueur($id){
        $this->idJoueur = $idJoueur;
    }
	
	public function setNomSalon($nomSalon){
        $this->nomSalon = $nomSalon;
    }
}