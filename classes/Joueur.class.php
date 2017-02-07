<?php

class Joueur {

	private $id;
	private $pseudo;
	private $password;
	
=======
	private $main;

>>>>>>> 629adcdf9de337a77520b06151185ed6ec0d0366
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
				case "main": $this ->setPassword($valeur);	
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
