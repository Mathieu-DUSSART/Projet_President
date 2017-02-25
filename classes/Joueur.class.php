<?php

class Joueur {

	private $id;
	private $pseudo;
	private $password;

	private $main;

	public function __construct($valeurs = array()){
        if(!empty($valeurs)){
            $this->affecte($valeurs);
        }
    }

    public function affecte($tab = array()){
		foreach($tab as $val => $valeurs){
			switch ($val){
				case "joueur_id" : $this->setIdJoueur($valeurs);
				break;
				case "joueur_pseudo": $this->setPseudo($valeurs);
				break;
				case "joueur_password": $this ->setPassword($valeur);
				break;
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

	public function getPassword(){
		return $this->password;
	}

	//**********************************SETTERS**************************
    public function setIdJoueur($id){
        $this->id = $id;
    }

	public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }

	public function setPassword($password){
		$this->password = $password;
	}

}
