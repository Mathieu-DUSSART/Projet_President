<?php

class Joueur {

	private $id;
	private $pseudo;
	private $main;

	public function __construct($valeurs = array()){
        if(!empty($valeurs)){
            $this->affecte($valeurs);
        }
    }

    public function affecte($tab = array()){
		foreach($tab as $val => $valeurs){
			switch ($val){
				case "id" : $this->setIdJoueur($valeurs);
				break;
				case "pseudo": $this->setPseudo($valeurs);
				break;
				case "main": $this ->setMain($valeur);
			}
		}
	}
	//**********************************GETTERS**************************
	public function getIdJoueur(){
		return $this->id;
	}

	public function getPseudo(){
		return $this->pseudo;
	}

	public function getMain(){
		return $this->main;
	}

	//**********************************SETTERS**************************
    public function setIdJoueur($id){
        $this->id = $id;
    }

	public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }

	public function setMain($main){
        $this->main = $main;
    }

}
