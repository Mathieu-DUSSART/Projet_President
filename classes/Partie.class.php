<?php 

class Partie {
	
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
				case "partie_id" : $this->setIdPartie($valeurs);
				break;
				case "partie_nom": $this->setNomSalon($valeurs);
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
    public function setIdPartie($idPartie){
        $this->idPartie = $idPartie;
    }
	
	public function setNomSalon($nomSalon){
        $this->nomSalon = $nomSalon;
    }
}